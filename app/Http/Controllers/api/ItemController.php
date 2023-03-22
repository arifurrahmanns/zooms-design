<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\ItemResource as ResourcesItemResource;
use App\Http\Resources\api\ItemDetailResource;
use App\Models\DesignCategory;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function listItems(Request $request)
    {
        $items = Item::withPlans()->get();

        return response()->json([
            'success' => 'success',
            'data' => ResourcesItemResource::collection($items),
        ], 200);
    }

    public function listItemByCategory(Request $request) {
        $request->validate([
            'slug' => 'required',
        ]);
        $limit = $request->input('limit', 100);
        $items = Item::withPlans($request->slug)
                        ->limit($limit)
                        ->get();
        return response()->json([
            'success' => 'success',
            'data' => ResourcesItemResource::collection($items),
        ], 200);
    }
    public function listItemForAllCategories(Request $request) {

        $title = $request->title;

        $categories = DesignCategory::where('is_visible', 1)->select('slug')->get();
        $result = collect();
        foreach ($categories as $category) {
            $items = Item::withPlans($category->slug);
            if ($title) {
                $items = $items
                    ->where(DB::raw('lower(title)'), 'like', '%' . strtolower($title) . '%')
                    ->limit(50)
                    ->get();
            } else {
                $items = $items
                    ->limit(4)
                    ->get();
            }

            if(count($items) > 0) {
                $result = $result->merge($items);
            }
        }
        return response()->json([
            'success' => 'success',
            'data' => ResourcesItemResource::collection($result),
        ], 200);
    }

    public function listPopularItems() {
        $items = Item::withPlans()
            ->limit(10)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => 'success',
            'data' => ResourcesItemResource::collection($items),
        ], 200);
    }

    public function itemDetail(Request $request) {
        $request->validate(['slug' => 'required']);
        $item = Item::with('plans', 'media', 'category')
            ->where('slug', $request->slug)
            ->first();

        return response()->json([
            'success' => 'success',
            'data' => ItemDetailResource::make($item),
        ], 200);
    }
}
