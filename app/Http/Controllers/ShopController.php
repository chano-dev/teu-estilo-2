<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()
            ->with(['images', 'variations', 'brand', 'colors', 'sizes', 'subcategory.category']);

        // Apply filters
        $this->applyFilters($query, $request);

        // Apply sorting
        $this->applySorting($query, $request->get('sort', 'newest'));

        // Pagination
        $products = $query->active()->paginate(24)->withQueryString();

        // Get filter options
        $categories = Category::query()
            ->with(['subcategories' => function ($query) {
                $query->active()->ordered();
            }])
            ->active()
            ->ordered()
            ->get();

        return Inertia::render('shop/index', [
            'products' => $products,
            'categories' => $categories,
            'filters' => $request->all(['filter', 'search', 'sort', 'page']),
        ]);
    }

    public function category(Request $request, Category $category)
    {
        $query = Product::query()
            ->whereHas('subcategory', function ($q) use ($category) {
                $q->where('category_id', $category->id);
            })
            ->with(['images', 'variations', 'brand', 'colors', 'sizes', 'subcategory.category']);

        $this->applyFilters($query, $request);
        $this->applySorting($query, $request->get('sort', 'newest'));

        $products = $query->active()->paginate(24)->withQueryString();

        $categories = Category::query()
            ->with(['subcategories' => function ($query) {
                $query->active()->ordered();
            }])
            ->active()
            ->ordered()
            ->get();

        return Inertia::render('shop/category', [
            'category' => $category,
            'products' => $products,
            'categories' => $categories,
            'filters' => $request->all(['filter', 'search', 'sort', 'page']),
        ]);
    }

    public function subcategory(Request $request, Category $category, Subcategory $subcategory)
    {
        $query = Product::query()
            ->where('subcategory_id', $subcategory->id)
            ->with(['images', 'variations', 'brand', 'colors', 'sizes', 'subcategory.category']);

        $this->applyFilters($query, $request);
        $this->applySorting($query, $request->get('sort', 'newest'));

        $products = $query->active()->paginate(24)->withQueryString();

        $categories = Category::query()
            ->with(['subcategories' => function ($query) {
                $query->active()->ordered();
            }])
            ->active()
            ->ordered()
            ->get();

        return Inertia::render('shop/subcategory', [
            'category' => $category,
            'subcategory' => $subcategory,
            'products' => $products,
            'categories' => $categories,
            'filters' => $request->all(['filter', 'search', 'sort', 'page']),
        ]);
    }

    private function applyFilters($query, Request $request)
    {
        $filters = $request->get('filter', []);

        // Search
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Price range
        if (! empty($filters['price_min'])) {
            $query->where('price_sell', '>=', $filters['price_min']);
        }
        if (! empty($filters['price_max'])) {
            $query->where('price_sell', '<=', $filters['price_max']);
        }

        // Boolean filters
        if (! empty($filters['on_sale'])) {
            $query->where('is_on_sale', true);
        }
        if (! empty($filters['new'])) {
            $query->where('is_new', true);
        }
        if (! empty($filters['featured'])) {
            $query->where('is_featured', true);
        }
        if (! empty($filters['trending'])) {
            $query->where('is_trending', true);
        }

        // Colors
        if (! empty($filters['colors'])) {
            $query->whereHas('colors', function ($q) use ($filters) {
                $q->whereIn('colors.id', $filters['colors']);
            });
        }

        // Sizes
        if (! empty($filters['sizes'])) {
            $query->whereHas('sizes', function ($q) use ($filters) {
                $q->whereIn('sizes.id', $filters['sizes']);
            });
        }

        // Brands
        if (! empty($filters['brands'])) {
            $query->whereIn('brand_id', $filters['brands']);
        }

        // Materials
        if (! empty($filters['materials'])) {
            $query->whereHas('materials', function ($q) use ($filters) {
                $q->whereIn('materials.id', $filters['materials']);
            });
        }

        // Occasions
        if (! empty($filters['occasions'])) {
            $query->whereHas('occasions', function ($q) use ($filters) {
                $q->whereIn('occasions.id', $filters['occasions']);
            });
        }

        // Styles
        if (! empty($filters['styles'])) {
            $query->whereHas('styles', function ($q) use ($filters) {
                $q->whereIn('styles.id', $filters['styles']);
            });
        }

        // Body types
        if (! empty($filters['body_types'])) {
            $query->whereHas('bodyTypes', function ($q) use ($filters) {
                $q->whereIn('body_types.id', $filters['body_types']);
            });
        }
    }

    private function applySorting($query, string $sort)
    {
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price_sell', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_sell', 'desc');
                break;
            case 'popular':
                $query->orderBy('sales_count', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }
    }
}
