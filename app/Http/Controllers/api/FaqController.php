<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function getAllFaq(Request $request) {
        $page = $request->page ?? 'ABOUT_US';
        $faqs = Faq::where('is_visible', 1)
                ->where('page', $page)
                ->get();

        return response()->json([
            'success' => 'success',
            'data' => FaqResource::collection($faqs),
        ], 200);
    }
}
