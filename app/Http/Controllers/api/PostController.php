<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\PostDetailResource;
use App\Http\Resources\api\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPosts(Request $request)
    {
        $limit = $request->input('limit', 50);
        $casStudies = Post::with(['media'])->where('is_visible', 1)
            ->limit($limit)
            ->latest()
            ->get();

        return response()->json([
            'success' => 'success',
            'data' => PostResource::collection($casStudies),
        ], 200);
    }

    public function postDetail(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->id;
        $data = Post::with(['media'])
            ->where('is_visible', 1)
            ->find($id);
        return response()->json([
            'success' => 'success',
            'data' => PostDetailResource::make($data),
        ], 200);
    }
}
