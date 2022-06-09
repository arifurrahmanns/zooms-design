<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\CaseStudyDetailResource;
use App\Http\Resources\api\CaseStudyResource;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function listCaseStudies(Request $request)
    {
        $limit = $request->input('limit', 50);
        $casStudies = CaseStudy::with(['media'])->where('is_visible', 1)
            ->limit($limit)
            ->latest()
            ->get();

        return response()->json([
            'success' => 'success',
            'data' => CaseStudyResource::collection($casStudies),
        ], 200);
    }

    public function caseStudyDetail(Request $request)
    {
        $request->validate(['id' => 'required']);
        $id = $request->id;
        $data = CaseStudy::with(['media'])
            ->where('is_visible', 1)
            ->find($id);
        return response()->json([
            'success' => 'success',
            'data' => CaseStudyDetailResource::make($data),
        ], 200);
    }
}
