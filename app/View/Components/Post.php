<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    public string $title;
    public string $languages;

    public function __construct($post)
    {
        $this->title     = $post->job_title;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
    }

    public function render()
    {
        return view('components.post');
    }
}
