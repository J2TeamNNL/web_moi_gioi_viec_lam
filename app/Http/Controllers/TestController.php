<?php

namespace App\Http\Controllers;

use App\Enums\FileTypeEnum;
use App\Enums\PostStatusEnum;
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
        $columns = array();
        foreach(\DB::select("SHOW COLUMNS FROM posts") as $column)
        {
            $columns[] = $column->Field;
        }

        return $columns;
    }
}
