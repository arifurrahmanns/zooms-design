<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\TrustedBrandResource;
use App\Models\TrustedBrand;
use Illuminate\Http\Request;

class TrustedBrandController extends Controller
{

    public function listTrustedBrands() {
        $data = TrustedBrand::with(['media'])
                ->where('is_visible', 1)
                ->select(['id', 'name'])
                ->get();

        return response()->json([
            'success' => 'success',
            'data' => TrustedBrandResource::collection($data),
        ], 200);
    }
}
