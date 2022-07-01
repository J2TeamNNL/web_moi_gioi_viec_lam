<?php

namespace App\Imports;

use App\Enums\FileTypeEnum;
use App\Enums\PostRemotableEnum;
use App\Enums\PostStatusEnum;
use App\Models\Company;
use App\Models\File;
use App\Models\Language;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToArray, WithHeadingRow
{
    public function array(array $array): void
    {
        foreach ($array as $each) {
            try {
                $remotable   = PostRemotableEnum::OFFICE_ONLY;
                $companyName = $each['cong_ty'];
                $language    = $each['ngon_ngu'];
                $city        = $each['dia_diem'];
                if ($city === 'Nhiều') {
                    $city = null;
                } elseif ($city === 'Remote') {
                    $remotable = PostRemotableEnum::REMOTE_ONLY;
                    $city      = null;
                } else {
                    $city = str_replace([
                        'HN',
                        'HCM',
                    ], [
                        'Hà Nội',
                        'Hồ Chí Minh',
                    ], $city);
                }
                $link = $each['link'];

                if (!empty($companyName)) {
                    $companyId = Company::firstOrCreate([
                        'name' => $companyName,
                    ], [
                        'country' => 'Vietnam',
                    ])->id;
                } else {
                    $companyId = null;
                }


                $post = Post::create([
                    'job_title'  => $language,
                    'company_id' => $companyId,
                    'city'       => $city,
                    'status'     => PostStatusEnum::ADMIN_APPROVED,
                    'remotable'  => $remotable,
                ]);

                $languages = explode(',', $language);
                foreach ($languages as $language) {
                    Language::firstOrCreate([
                        'name' => trim($language),
                    ]);
                }

                File::create([
                    'post_id' => $post->id,
                    'link'    => $link,
                    'type'    => FileTypeEnum::JD,
                ]);
            } catch (\Throwable $e) {
                dd($each, $e);
            }
        }
    }
}
