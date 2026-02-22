<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show(Request $request, Product $product)
    {
        // Load relationships
        $product->load([
            'images',
            'variations.color',
            'variations.size',
            'brand',
            'collection',
            'subcategory.category',
            'colors',
            'sizes',
            'materials',
            'occasions',
            'styles',
            'patterns',
            'fits',
            'lengths',
            'necklines',
            'sleeves',
            'bodyTypes',
            'careInstructions',
            'certifications',
        ]);

        // Get related products
        $relatedProducts = Product::query()
            ->where('subcategory_id', $product->subcategory_id)
            ->where('id', '!=', $product->id)
            ->with(['images', 'variations', 'brand', 'colors'])
            ->active()
            ->limit(12)
            ->get();

        // Increment view count
        $product->increment('views_count');

        // Get available variations for display
        $variations = $product->variations()
            ->with(['color', 'size'])
            ->get()
            ->groupBy('color_id');

        return Inertia::render('product/show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'variations' => $variations,
        ]);
    }
}
