<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SEOController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/case-studies/{slug}', [SEOController::class, 'caseStudy']);
Route::get('/post/{slug}', [SEOController::class, 'post']);


Route::get("/price", [FrontendController::class, 'price']);
Route::get('/{vue_capture?}', function () {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');
