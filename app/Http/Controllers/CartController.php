<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $this->getCart($request);

        if ($cart) {
            $cart->load(['items.product.images', 'items.variation.color', 'items.variation.size']);
        }

        return Inertia::render('cart', [
            'cart' => $cart,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variation_id' => 'nullable|exists:product_variations,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Calculate price
        $unitPrice = $product->price_sell;

        if ($request->variation_id) {
            $variation = ProductVariation::findOrFail($request->variation_id);
            $unitPrice += $variation->price_adjustment;

            // Check stock
            if ($variation->stock_quantity < $request->quantity) {
                return back()->with('error', 'Stock insuficiente para esta variação.');
            }
        }

        $cart = $this->getCart($request);

        // Check if item already exists in cart
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->where('variation_id', $request->variation_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->unit_price;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'variation_id' => $request->variation_id,
                'quantity' => $request->quantity,
                'unit_price' => $unitPrice,
                'subtotal' => $request->quantity * $unitPrice,
            ]);
        }

        // Recalculate cart totals
        $cart->recalculateTotals();

        return back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $cartItem = CartItem::findOrFail($request->item_id);

        if ($request->quantity === 0) {
            $cartItem->delete();
        } else {
            $cartItem->quantity = $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->unit_price;
            $cartItem->save();
        }

        // Recalculate cart totals
        $cartItem->cart->recalculateTotals();

        return back();
    }

    public function remove(Request $request, int $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cart = $cartItem->cart;

        $cartItem->delete();

        // Recalculate cart totals
        $cart->recalculateTotals();

        return back()->with('success', 'Produto removido do carrinho.');
    }

    public function checkout(Request $request)
    {
        $cart = $this->getCart($request);
        $cart->load(['items.product', 'items.variation.color', 'items.variation.size']);

        // Generate WhatsApp message
        $message = $this->generateWhatsAppMessage($cart);

        // Encode message for WhatsApp
        $whatsappNumber = config('app.whatsapp_number', '244923456789');
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=".urlencode($message);

        return redirect($whatsappUrl);
    }

    private function getCart(Request $request): Cart
    {
        $sessionId = $request->session()->getId();
        $userId = Auth::id();

        // Try to find existing cart
        $cart = Cart::query()
            ->with('items')
            ->where(function ($query) use ($userId, $sessionId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else {
                    $query->where('session_id', $sessionId);
                }
            })
            ->where('status', 'active')
            ->first();

        // Create new cart if not found
        if (! $cart) {
            $cart = Cart::create([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'cart_token' => Str::random(64),
                'status' => 'active',
                'expires_at' => now()->addDays(7),
            ]);
        }

        return $cart;
    }

    private function generateWhatsAppMessage(Cart $cart): string
    {
        $message = "🛍️ *Novo Pedido - Teu Estilo*\n\n";

        foreach ($cart->items as $index => $item) {
            $productName = $item->product->name;
            $variation = '';

            if ($item->variation) {
                $color = $item->variation->color?->name ?? '';
                $size = $item->variation->size?->name ?? '';
                $variation = " ({$color}, {$size})";
            }

            $message .= ($index + 1).". {$productName}{$variation}\n";
            $message .= "   Quantidade: {$item->quantity} x ".number_format($item->unit_price, 0, ',', '.')." Kz\n";
            $message .= '   Subtotal: '.number_format($item->subtotal, 0, ',', '.')." Kz\n\n";
        }

        $message .= "────────────────────\n";
        $message .= '*Subtotal:* '.number_format($cart->subtotal, 0, ',', '.')." Kz\n";
        $message .= '*Total:* '.number_format($cart->total, 0, ',', '.')." Kz\n\n";

        $message .= "📍 *Dados de Entrega*\n";
        $message .= "Nome: {$cart->guest_name}\n";
        $message .= "Telefone: {$cart->guest_phone}\n";
        $message .= "Morada: {$cart->delivery_street}, {$cart->delivery_neighborhood}\n";
        $message .= "{$cart->delivery_city}, {$cart->delivery_province}\n\n";

        $message .= 'Obrigado pela sua preferência! 🎉';

        return $message;
    }
}
