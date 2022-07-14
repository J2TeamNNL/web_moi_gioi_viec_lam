<?php

namespace App\Http\Controllers\Applicant;

use App\Enums\PostRemotableEnum;
use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $searchCities = $request->get('cities', []);

        $arrCity   = getAndCachePostCities();
        $configs   = Config::getAndCache(0);
        $minSalary = $request->get('min_salary', $configs['filter_min_salary']);
        $maxSalary = $request->get('max_salary', $configs['filter_max_salary']);

        $query = Post::query()
            ->with([
                'languages',
                'company' => function ($q) {
                    return $q->select([
                        'id',
                        'name',
                        'logo',
                    ]);
                }
            ])
            ->approved()
            ->orderByDesc('is_pinned')
            ->orderByDesc('id');

        if (!empty($searchCities)) {
            $query->where(function ($q) use ($searchCities) {
                foreach ($searchCities as $searchCity) {
                    $q->orWhere('city', 'like', '%' . $searchCity . '%');
                }
                $q->orWhereNull('city');
            });
        }

        if ($request->has('min_salary')) {
            $query->where(function ($q) use ($minSalary) {
                $q->orWhere('min_salary', '>=', $minSalary);
                $q->orWhereNull('min_salary');
            });
        }

        if ($request->has('max_salary')) {
            $query->where(function ($q) use ($maxSalary) {
                $q->orWhere('max_salary', '<=', $maxSalary);
                $q->orWhereNull('max_salary');
            });
        }

        $remotable = $request->get('remotable');
        if (!empty($remotable)) {
            $query->where('remotable', $remotable);
        }

        $posts = $query->paginate();

        $filtersPostRemotable = PostRemotableEnum::getArrWithLowerKey();

        return view('applicant.index', [
            'posts'                => $posts,
            'arrCity'              => $arrCity,
            'searchCities'         => $searchCities,
            'minSalary'            => $minSalary,
            'maxSalary'            => $maxSalary,
            'configs'              => $configs,
            'filtersPostRemotable' => $filtersPostRemotable,
            'remotable'            => $remotable,
        ]);
    }

    public function show($postId)
    {
        $post = Post::query()
            ->with('file')
            ->approved()
            ->findOrFail($postId);

        return view('applicant.show', [
            'post' => $post,
        ]);
    }
}
