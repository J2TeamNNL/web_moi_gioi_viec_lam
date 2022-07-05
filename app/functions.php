<?php

use App\Enums\SystemCacheKeyEnum;
use App\Enums\UserRoleEnum;
use App\Models\Post;

if (!function_exists('getRoleByKey')) {
    function getRoleByKey($key): string
    {
        return strtolower(UserRoleEnum::getKeys($key)[0]);
    }
}

if (!function_exists('user')) {
    function user(): ?object
    {
        return auth()->user();
    }
}

if (!function_exists('getAndCachePostCities')) {
    function getAndCachePostCities(): array
    {
        return cache()->remember(
            SystemCacheKeyEnum::POST_CITIES,
            86400 * 30,
            function () {
                $cities  = Post::query()
                    ->pluck('city');
                $arrCity = [];
                foreach ($cities as $city) {
                    if (empty($city)) {
                        continue;
                    }
                    $arr = explode(', ', $city);
                    foreach ($arr as $item) {
                        if (in_array($item, $arrCity)) {
                            continue;
                        }
                        $arrCity[] = $item;
                    }
                }

                return $arrCity;
            }
        );
    }
}