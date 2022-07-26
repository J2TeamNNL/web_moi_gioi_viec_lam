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
    public function test()
    {
    }
}
