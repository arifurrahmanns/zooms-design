<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class OrderInquiryController extends Controller
{
    public function orderRequest(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'msg' => 'required',
            'product' => 'required',
        ]);

        $oi = OrderInquiry::create([
            'status' => 'New',
            'email' => $request->email,
            'full_name' => $request->name,
            'message' => $request->msg,
            'interest_product' => $request->product,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);

        if ($request->image) {
            $oi->addMediaFromBase64($request->image)
                ->usingFileName(Str::random(40).'.png')
                ->toMediaCollection('images');
        }


        return response()->json(['success' => 'success'], 200);
    }
}
