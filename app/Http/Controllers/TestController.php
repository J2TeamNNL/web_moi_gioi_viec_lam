<?php

namespace App\Http\Controllers;

use App\Enums\FileTypeEnum;
use App\Enums\PostRemotableEnum;
use App\Enums\PostStatusEnum;
use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\Discount;
use App\Models\File;
use App\Models\Language;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TestController extends Controller
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

    public function test()
    {
        $key = PostRemotableEnum::getKey(PostRemotableEnum::REMOTE_ONLY);
        $arr = explode('_', $key);
        $str = '';
        foreach ($arr as $each) {
            $str .= Str::title($each) . ' ';
        }

        return $str;
    }
}
