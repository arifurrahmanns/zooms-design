<?php

use App\Http\Controllers\api\CaseStudyController;
use App\Http\Controllers\api\DataController;
use App\Http\Controllers\api\DesignCategoryController;
use App\Http\Controllers\api\FaqController;
use App\Http\Controllers\api\InquiryController;
use App\Http\Controllers\api\ItemController;
use App\Http\Controllers\api\OrderInquiryController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\SettingController;
use App\Http\Controllers\api\TestimonialController;
use App\Http\Controllers\api\TrustedBrandController;
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
Route::post('/order-request', [OrderInquiryController::class, 'orderRequest']);
Route::post('/items', [ItemController::class, 'listItems']);
Route::post('/items/popular', [ItemController::class, 'listPopularItems']);
Route::post('/items/all-categories', [ItemController::class, 'listItemForAllCategories']);
Route::post('/items/category', [ItemController::class, 'listItemByCategory']);
Route::post('/item/info', [ItemController::class, 'itemDetail']);


Route::post('/posts', [PostController::class, 'listPosts']);
Route::post('/posts/category', [PostController::class, 'listPostCategory']);
Route::post('/post/info', [PostController::class, 'postDetail']);

Route::post('/case-studies', [CaseStudyController::class, 'listCaseStudies']);
Route::post('/case-study/info', [CaseStudyController::class, 'caseStudyDetail']);

Route::post('/trusted-brands', [TrustedBrandController::class, 'listTrustedBrands']);

Route::post('/data', [DataController::class, 'getBasicData']);

Route::post('/static-page', [SettingController::class, 'getStaticPage']);

Route::post('/page/become-member/data', [DataController::class, 'getDataForPageBecomeMember']);


Route::post('/faqs', [FaqController::class, 'getAllFaq']);
Route::post('/home-page', [DataController::class, 'getDataForHomePage']);