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
        $table2 = Discount::query()
            ->select('product_id')
            ->selectRaw('MAX(discount_price) AS max_discount')
            ->join('discount_product', 'discount_product.discount_id', 'discount.id')
            ->groupBy('product_id');

        $data = Product::query()
            ->addSelect('product.*')
            ->addSelect('d.max_discount')
            ->leftJoinSub($table2, 'd', function($join){
                $join->on('d.product_id', 'product.product_id');
            })
            ->get();

        return $data;
    }
}
