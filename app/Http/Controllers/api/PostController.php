<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\PostDetailResource;
use App\Http\Resources\api\PostResource;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPosts(Request $request)
    {
        $limit = $request->input('limit', 50);
        $category = $request->input('category', 'all');
        $posts = Post::with(['media'])->where('is_visible', 1)
            ->latest();

        if ($category != 'all') {
            $c = PostCategory::where('slug', $category)->first();
            if ($c) {
                $posts->where('category_id', $c->id);
            }
        }

        $posts = $posts->paginate($limit);

        return PostResource::collection($posts);
    }
    public function listPostCategory()
    {
        return PostCategory::get();
    }

    public function postDetail(Request $request)
    {
        $request->validate(['slug' => 'required']);
        $data = Post::with(['media', 'category'])
            ->where('is_visible', 1)
            ->where('slug', $request->slug)
            ->first();
        return response()->json([
            'success' => 'success',
            'data' => PostDetailResource::make($data),
        ], 200);
    }
}
