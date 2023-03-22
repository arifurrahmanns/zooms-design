<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\DesignCategoryResource;
use App\Models\DesignCategory;

class DesignCategoryController extends Controller
{

    public function get()
    {
        $data = DesignCategory::with(['media'])
            ->where('is_visible', 1)
            ->select(['id', 'name', 'color', 'desc', 'bg_color'])
            ->get();

        return response()->json([
            'success' => 'success',
            'data' => DesignCategoryResource::collection($data),
        ], 200);
    }
}
