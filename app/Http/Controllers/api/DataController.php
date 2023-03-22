<?php

namespace App\Http\Controllers\api;

use App\Constant\SettingConstant;
use App\Http\Controllers\Controller;
use App\Http\Resources\api\BundleServiceResource;
use App\Http\Resources\api\CaseStudyResource;
use App\Http\Resources\api\DesignCategoryResource;
use App\Http\Resources\api\PromoBannerResource;
use App\Http\Resources\api\ItemResource as ResourcesItemResource;
use App\Http\Resources\api\TestimonialResource;
use App\Http\Resources\api\TrustedBrandResource;
use App\Models\BundleService;
use App\Models\CaseStudy;
use App\Models\CustomizePage;
use App\Models\DesignCategory;
use App\Models\Item;
use App\Models\PromoBanner;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\TrustedBrand;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getBasicData()
    {
        $trusted_brands = TrustedBrand::with(['media'])
            ->where('is_visible', 1)
            ->select(['id', 'name'])
            ->get();

        $design_categories = DesignCategory::with(['media'])
            ->where('is_visible', 1)
            ->select(['id', 'name', 'color', 'desc', 'bg_color', 'slug'])
            ->get();

        $bundleServices = BundleService::with(['media'])->where('is_visible', 1)->get();


        $custom = CustomizePage::where('name', 'Page: Home Page')
            ->with('media')
            ->first();
        $footerImage = asset('images/placeholder.png');
        try {
            $footerImage = $custom->getMedia('footer_image')[0]->getFullUrl();
        } catch (\Throwable $th) {}
        $custom->footer_image = $footerImage;
        return response()->json([
            'success' => 'success',
            'data' => [
                'trusted_brands' => TrustedBrandResource::collection($trusted_brands),
                'design_categories' => DesignCategoryResource::collection($design_categories),
                'bundle_services' => BundleServiceResource::collection($bundleServices),
                'home_title' => $custom,
            ],
        ], 200);
    }

    public function getDataForPageBecomeMember() {
        $custom = CustomizePage::where('name', 'Page: Become Member')
            ->with('media')
            ->first();

        $image_left = asset('images/placeholder.png');;
        $image_right = asset('images/placeholder.png');;
        try {
            $image_left = $custom->getMedia('image_left')[0]->getFullUrl();
            $image_right = $custom->getMedia('image_right')[0]->getFullUrl();
        } catch (\Throwable $th) {

        }
        return response()->json([
            'success' => 'success',
            'data' => [
                'image_right' => $image_right,
                'image_left' => $image_left,
            ],
        ], 200);
    }

    public function getDataForHomePage() {
        $testis = Testimonial::where('is_visible', 1)
            ->with('media')
            ->get();

        $promos = PromoBanner::where('is_visible', 1)
            ->with('media')
            ->get();

        $topBanners = Setting::where('value', SettingConstant::TOP_BANNER)->with(['media'])->get();
        $bannerImages = [];
        foreach ($topBanners as $topBanner) {
            try {
                $bannerImages[] = $topBanner->getMedia('image')[0]->getFullUrl();
            } catch (\Throwable $th) {

            }
        }
        if (count($bannerImages) == 0) {
            $bannerImages[] = asset('images/placeholder.png');
        }


        $casStudies = CaseStudy::with(['media'])
            ->where('is_visible', 1)
            ->limit(3)
            ->latest()
            ->get();


        $popularItems = Item::withPlans()
            ->limit(8)
            ->latest()
            ->where('is_popular', 1)
            ->get();
        if ($popularItems->count() < 8) {
            $latestItems = Item::withPlans()
                ->limit(8 - $popularItems->count())
                ->latest()
                ->get();
            $popularItems = $popularItems->merge($latestItems);
        }

        return response()->json([
            'success' => 'success',
            'data' => [
                'testis' => TestimonialResource::collection($testis),
                'promos' => PromoBannerResource::collection($promos),
                'banner_images' => $bannerImages,
                'case_studies' => CaseStudyResource::collection($casStudies),
                'popular_items' => ResourcesItemResource::collection($popularItems),
            ],
        ], 200);
    }
}
