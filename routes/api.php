<?php

use App\Http\Controllers\api\CaseStudyController;
use App\Http\Controllers\api\DesignCategoryController;
use App\Http\Controllers\api\InquiryController;
use App\Http\Controllers\api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/design-categories', [DesignCategoryController::class, 'get']);
Route::post('/inquiry', [InquiryController::class, 'inquiry']);
Route::post('/items', [ItemController::class, 'listItems']);
Route::post('/items/popular', [ItemController::class, 'listPopularItems']);
Route::post('/items/all-categories', [ItemController::class, 'listItemForAllCategories']);
Route::post('/items/category', [ItemController::class, 'listItemByCategory']);
// Route::post('/item/:id', [ItemController::class, 'itemDetail']);

Route::post('/case-studies', [CaseStudyController::class, 'listCaseStudies']);
Route::post('/case-study/:id', [CaseStudyController::class, 'caseStudyDetail']);