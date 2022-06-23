<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    public object $post;
    public string $languages;
    public object $company;

    public function __construct($post)
    {
        $this->post      = $post;
        $this->languages = implode(', ', $post->languages->pluck('name')->toArray());
        $this->company   = $post->company;
    }

    public function render()
    {
        return view('components.post');
    }
}
