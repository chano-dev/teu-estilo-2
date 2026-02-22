<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return Inertia::render('account/index', [
            'user' => $user,
        ]);
    }

    public function wishlist(Request $request)
    {
        $wishlistItems = Wishlist::query()
            ->where('user_id', Auth::id())
            ->with(['product.images', 'product.variations', 'product.brand', 'product.colors'])
            ->latest()
            ->paginate(20);

        return Inertia::render('account/wishlist', [
            'wishlistItems' => $wishlistItems,
        ]);
    }

    public function orders(Request $request)
    {
        // For now, return empty - will implement with order system
        return Inertia::render('account/orders', [
            'orders' => [],
        ]);
    }

    public function addresses(Request $request)
    {
        $user = Auth::user();
        $addresses = $user->addresses ?? [];

        return Inertia::render('account/addresses', [
            'addresses' => $addresses,
        ]);
    }
}
