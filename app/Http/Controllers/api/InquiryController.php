<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function inquiry(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'msg' => 'required'
        ]);

        ContactUs::create([
            'status' => 'New',
            'email' => $request->email,
            'full_name' => $request->name,
            'message' => $request->msg,
        ]);

        return response()->json(['success' => 'success'], 200);
    }
}
