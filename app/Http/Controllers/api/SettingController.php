<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getStaticPage(Request $request) {
        $request->validate(['name' => 'required']);

        $setting = Setting::where('value', $request->name)->first();

        if (! $setting) {
            return response()->json([
                'data' => [],
            ], 404);
        }
        return response()->json([
            'success' => 'success',
            'data' => SettingResource::make($setting),
        ], 200);
    }
}
