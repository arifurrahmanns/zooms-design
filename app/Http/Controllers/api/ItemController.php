<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\ItemResource as ResourcesItemResource;
use App\Models\DesignCategory;
use App\Models\Item;
use Illuminate\Http\Request;

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
            'id' => 'required',
        ]);
        $categoryId = $request->id;
        $items = Item::withPlans($categoryId)
                        ->limit(50)
                        ->get();
        return response()->json([
            'success' => 'success',
            'data' => ResourcesItemResource::collection($items),
        ], 200);
    }
    public function listItemForAllCategories() {
        $categories = DesignCategory::where('is_visible', 1)->select('id')->get();
        $result = collect();
        foreach ($categories as $category) {
            $items = Item::withPlans($category->id)
                        ->limit(4)
                        ->get();
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

    public function itemDetail(Request $request, int $id)
    {
        $item = Item::with('plans')->find($id);

        return response()->json([
            'success' => 'success',
            'data' => $item,
        ], 200);
    }
}
