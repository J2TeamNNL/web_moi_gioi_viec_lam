<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostLevelEnum;
use App\Enums\PostRemotableEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Controllers\SystemConfigController;
use App\Http\Requests\Post\StoreRequest;
use App\Imports\PostImport;
use App\Models\Company;
use App\Models\Language;
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
        $levels = PostLevelEnum::asArray();

        return view('admin.posts.index', [
            'levels' => $levels,
        ]);
    }

    public function create()
    {
        $configs    = SystemConfigController::getAndCache();
        $remotables = PostRemotableEnum::getArrWithoutAll();

        return view('admin.posts.create', [
            'currencies' => $configs['currencies'],
            'countries'  => $configs['countries'],
            'remotables' => $remotables,
        ]);
    }

    public function importCsv(Request $request): JsonResponse
    {
        try {
            $levels = $request->input('levels');
            $file   = $request->file('file');

            Excel::import(new PostImport($levels), $file);

            return $this->successResponse();
        } catch (Throwable $e) {
            return $this->errorResponse();
        }
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $arr = $request->validated();

            $companyName = $request->get('company');

            if (!empty($companyName)) {
                $arr['company_id'] = Company::firstOrCreate(['name' => $companyName])->id;
            }
            if ($request->has('remotable')) {
                $arr['remotable'] = $request->get('remotable');
            }
            if ($request->has('can_parttime')) {
                $arr['can_parttime'] = 1;
            }

            $post      = Post::create($arr);
            $languages = $request->get('languages');

            foreach ($languages as $language) {
                $language = Language::firstOrCreate(['name' => $language]);
                ObjectLanguage::create([
                    'object_id'   => $post->id,
                    'language_id' => $language->id,
                    'object_type' => Post::class,
                ]);
            }

            DB::commit();
            return $this->successResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->errorResponse($e->getMessage());
        }
    }
}
