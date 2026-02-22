<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MarketingImage;
use App\Models\Product;
use App\Models\Subcategory;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Get active categories with subcategories
        $categories = Category::query()
            ->with(['subcategories' => function ($query) {
                $query->active()->ordered();
            }])
            ->active()
            ->ordered()
            ->get();

        // Get subcategories for the category grid
        $subcategories = Subcategory::query()
            ->with('category')
            ->active()
            ->ordered()
            ->limit(10)
            ->get();

        // Get hero banners (marketing images)
        $heroBanners = MarketingImage::query()
            ->where('image_type', 'hero')
            ->active()
            ->current()
            ->ordered()
            ->limit(5)
            ->get();

        // Get featured products
        $featuredProducts = Product::query()
            ->with(['images', 'variations', 'brand', 'colors'])
            ->active()
            ->featured()
            ->limit(12)
            ->get();

        // Get trending products
        $trendingProducts = Product::query()
            ->with(['images', 'variations', 'brand', 'colors'])
            ->active()
            ->trending()
            ->limit(12)
            ->get();

        // Get new products
        $newProducts = Product::query()
            ->with(['images', 'variations', 'brand', 'colors'])
            ->active()
            ->new()
            ->latest()
            ->limit(12)
            ->get();

        // Get sale products
        $saleProducts = Product::query()
            ->with(['images', 'variations', 'brand', 'colors'])
            ->active()
            ->onSale()
            ->limit(12)
            ->get();

        // Get promotional banners
        $promoBanners = MarketingImage::query()
            ->where('image_type', 'promotional')
            ->active()
            ->current()
            ->ordered()
            ->limit(3)
            ->get();

        return Inertia::render('home', [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'heroBanners' => $heroBanners,
            'featuredProducts' => $featuredProducts,
            'trendingProducts' => $trendingProducts,
            'newProducts' => $newProducts,
            'saleProducts' => $saleProducts,
            'promoBanners' => $promoBanners,
        ]);
    }
}
