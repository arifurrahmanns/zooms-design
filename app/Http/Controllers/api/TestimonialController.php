<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function listTestimonial()
    {
        $data = Testimonial::where('is_visible', 1)
            ->with('media')
            ->get();

        return response()->json([
            'success' => 'success',
            'data' => TestimonialResource::collection($data),
        ], 200);
    }
}
