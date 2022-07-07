<?php

namespace App\Models;

use App\Enums\SystemCacheKeyEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public static function getAndCache($isPublic): array
    {
        return cache()->remember(
            SystemCacheKeyEnum::CONFIGS . $isPublic,
            86400 * 30,
            function () use ($isPublic) {
                $data = self::query()
                    ->where('is_public', $isPublic)
                    ->get();
                $arr  = [];

                foreach ($data as $each) {
                    $arr[$each->key] = $each->value;
                }

                return $arr;
            }
        );
    }

    public static function getByKey($key)
    {
        return cache()->remember(
            SystemCacheKeyEnum::CONFIGS . $key,
            86400 * 30,
            function () use ($key) {
                return self::query()
                    ->where('key', $key)
                    ->value('value');
            }
        );
    }
}
