<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function get() {
        return Category::where('is_visible', true)->select(['id', 'name'])->get();
    }
}
