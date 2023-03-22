<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SEOController extends Controller
{
    public function post(Request $request, $slug) {

        $post = Post::with(['media'])
            ->where('is_visible', 1)
            ->where('slug', $slug)
            ->first();

        $image = asset('images/placeholder.png');
        try {
            $image = $post->getMedia('thumbnail')[0]->getFullUrl();
        } catch (\Throwable $th) {}

        return view('index', [
            'image' => $image,
            'description' => Str::limit(strip_tags($post->content), 200),
            'title' => $post->title,
            'url' => config('app.url') . "/post/$slug",
            'type' => 'article',
        ]);
    }

    public function caseStudy(Request $request, $slug) {
        $caseStudy = CaseStudy::with(['media'])
            ->where('is_visible', 1)
            ->where('slug', $slug)
            ->first();

        $image = asset('images/placeholder.png');
        try {
            $image = $caseStudy->getMedia('thumbnail')[0]->getFullUrl();
        } catch (\Throwable $th) {}

        return view('index', [
            'image' => $image,
            'description' => Str::limit(strip_tags($caseStudy->content), 200),
            'title' => $caseStudy->title,
            'url' => config('app.url') . "/case-studies/$slug",
            'type' => 'article',
        ]);
    }
}
