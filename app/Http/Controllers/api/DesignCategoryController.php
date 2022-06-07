<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DesignCategory;

class DesignCategoryController extends Controller
{

    public function get() {
        return DesignCategory::where('is_visible', 1)->select(['id', 'name', 'color', 'desc'])->get();
    }
}
