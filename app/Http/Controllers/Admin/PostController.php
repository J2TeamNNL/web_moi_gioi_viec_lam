<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostRemotableEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Controllers\SystemConfigController;
use App\Http\Requests\Post\StoreRequest;
use App\Imports\PostImport;
use App\Models\Company;
use App\Models\ObjectLanguage;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class PostController extends Controller
{
    use ResponseTrait;

    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Post::query();
        $this->table = (new Post())->getTable();

        View::share('title', ucwords($this->table));
        View::share('table', $this->table);
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $configs = SystemConfigController::getAndCache();

        return view('admin.posts.create', [
            'currencies' => $configs['currencies'],
            'countries'  => $configs['countries'],
        ]);
    }

    public function importCsv(Request $request): JsonResponse
    {
        try {
            Excel::import(new PostImport(), $request->file('file'));

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->errorResponse();
        }
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $arr = $request->only([
                'job_title',
                'city',
                "district",
                "min_salary",
                "max_salary",
                "currency_salary",
                "requirement",
                "start_date",
                "end_date",
                "number_applicants",
                "slug",
            ]);

            $companyName = $request->get('company');

            if (!empty($companyName)) {
                $arr['company_id'] = Company::firstOrCreate(['name' => $companyName])->id;
            }
            if ($request->has('remotables')) {
                $remotables = $request->get('remotables');
                if (!empty($remotables['remote']) && !empty($remotables['office'])) {
                    $arr['remotable'] = PostRemotableEnum::DYNAMIC;
                } elseif (!empty($remotables['remote'])) {
                    $arr['remotable'] = PostRemotableEnum::REMOTE_ONLY;
                } else {
                    $arr['remotable'] = PostRemotableEnum::OFFICE_ONLY;
                }
            }
            if ($request->has('can_parttime')) {
                $arr['can_parttime'] = 1;
            }

            $post      = Post::create($arr);
            $languages = $request->get('languages');

            foreach ($languages as $language) {
                ObjectLanguage::create([
                    'language_id' => $language,
                    'object_id'   => $post->id,
                    'type'        => ObjectLanguageTypeEnum::POST,
                ]);
            }

            DB::commit();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->errorResponse();
        }
    }
}
