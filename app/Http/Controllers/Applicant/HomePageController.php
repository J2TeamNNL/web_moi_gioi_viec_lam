<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomePageController extends Controller
{
    public function index()
    {
        $posts = Post::query()
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
            ->latest()
            ->paginate();

        return view('applicant.index', [
            'posts' => $posts,
        ]);
    }
}
