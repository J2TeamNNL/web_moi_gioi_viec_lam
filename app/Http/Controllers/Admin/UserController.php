<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = User::query();
        $this->table = (new User())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index(Request $request)
    {
        $selectedRole    = $request->get('role');
        $selectedCity    = $request->get('city');
        $selectedCompany = $request->get('company');

        $query = $this->model->clone()
            ->with('company:id,name')
            ->latest();
        if (!empty($selectedRole) && $selectedRole !== 'All') {
            $query->where('role', $selectedRole);
        }
        if (!empty($selectedCity) && $selectedCity !== 'All') {
            $query->where('city', $selectedCity);
        }
        if (!empty($selectedCompany) && $selectedCompany !== 'All') {
            $query->whereHas('company', function ($q) use ($selectedCompany) {
                return $q->where('id', $selectedCompany);
            });
        }
        $data = $query->paginate();

        $roles = UserRoleEnum::asArray();

        $companies = Company::query()
            ->get([
                'id',
                'name',
            ]);

        $cities = $this->model->clone()
            ->distinct()
            ->limit(10)
            ->pluck('city');

        return view("admin.$this->table.index", [
            'data'            => $data,
            'roles'           => $roles,
            'cities'          => $cities,
            'companies'       => $companies,
            'selectedRole'    => $selectedRole,
            'selectedCity'    => $selectedCity,
            'selectedCompany' => $selectedCompany,
        ]);
    }

    public function destroy($userId)
    {
        User::destroy($userId);

        return redirect()->back();
    }
}
