import { Link, usePage } from '@inertiajs/react';
import { Minus, Plus, Trash2, ShoppingBag, ArrowRight } from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import { useState } from 'react';
import { cn } from '@/lib/utils';
import type { PageProps, Cart } from '@/types';

interface CartItem {
    id: number;
    product_id: number;
    variation_id: number | null;
    quantity: number;
    unit_price: number;
    subtotal: number;
    product: {
        id: number;
        name: string;
        slug: string;
        price_sell: number;
        images: Array<{ id: number; file_path: string }>;
    };
    variation: {
        id: number;
        color?: { name: string };
        size?: { name: string };
    } | null;
}

interface CartPageProps {
    cart:
        | (Cart & {
              items: CartItem[];
          })
        | null;
}

export default function CartPage() {
    const { cart } = usePage<PageProps & CartPageProps>().props;
    const [loading, setLoading] = useState(false);

    const items = cart?.items || [];
    const isEmpty = items.length === 0;

    const updateQuantity = async (itemId: number, newQuantity: number) => {
        setLoading(true);
        try {
            await fetch('/cart/update', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN':
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute('content') || '',
                },
                body: JSON.stringify({
                    item_id: itemId,
                    quantity: newQuantity,
                }),
            });
            window.location.reload();
        } catch (error) {
            console.error('Error updating quantity:', error);
        } finally {
            setLoading(false);
        }
    };

    const removeItem = async (itemId: number) => {
        setLoading(true);
        try {
            await fetch(`/cart/remove/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN':
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute('content') || '',
                },
            });
            window.location.reload();
        } catch (error) {
            console.error('Error removing item:', error);
        } finally {
            setLoading(false);
        }
    };

    const checkoutViaWhatsApp = () => {
        const message = generateWhatsAppMessage();
        const phone = '244923456789';
        const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
    };

    const generateWhatsAppMessage = () => {
        if (!cart) return '';

        let message = '🛍️ Novo Pedido - Teu Estilo\n\n';

        items.forEach((item, index) => {
            const variation = item.variation
                ? ` (${item.variation.color?.name || ''}, ${item.variation.size?.name || ''})`
                : '';

            message += `${index + 1}. ${item.product.name}${variation}\n`;
            message += `   Quantidade: ${item.quantity} x ${item.unit_price.toLocaleString('pt-AO')} Kz\n`;
            message += `   Subtotal: ${item.subtotal.toLocaleString('pt-AO')} Kz\n\n`;
        });

        message += '--------------------\n';
        message += `Subtotal: ${(cart.subtotal || 0).toLocaleString('pt-AO')} Kz\n`;
        message += `Total: ${(cart.total || 0).toLocaleString('pt-AO')} Kz\n\n`;

        message += 'Por favor, confirme os dados de entrega.\n';
        message += 'Obrigado pela preferência!';

        return message;
    };

    return (
        <StorefrontLayout title="Carrinho de Compras | Teu Estilo">
            <div className="container mx-auto px-4 py-8">
                <h1 className="mb-8 text-2xl font-bold text-gray-900">
                    Carrinho de Compras
                </h1>

                {isEmpty ? (
                    <div className="py-16 text-center">
                        <ShoppingBag className="mx-auto mb-4 h-16 w-16 text-gray-300" />
                        <h2 className="mb-2 text-xl font-semibold text-gray-900">
                            O seu carrinho está vazio
                        </h2>
                        <p className="mb-8 text-gray-500">
                            Descubra os nossos produtos e faça as suas compras!
                        </p>
                        <Link
                            href="/shop"
                            className="inline-flex items-center gap-2 rounded-full bg-orange-500 px-6 py-3 font-medium text-white transition-colors hover:bg-orange-600"
                        >
                            Ver Produtos
                            <ArrowRight className="h-5 w-5" />
                        </Link>
                    </div>
                ) : (
                    <div className="grid grid-cols-1 gap-8 lg:grid-cols-3">
                        {/* Cart Items */}
                        <div className="space-y-4 lg:col-span-2">
                            {items.map((item) => (
                                <div
                                    key={item.id}
                                    className="flex gap-4 rounded-lg border border-gray-200 bg-white p-4"
                                >
                                    {/* Product Image */}
                                    <Link
                                        href={`/product/${item.product.slug}`}
                                        className="shrink-0"
                                    >
                                        <img
                                            src={
                                                item.product.images[0]
                                                    ?.file_path ||
                                                'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=200&h=200&fit=crop'
                                            }
                                            alt={item.product.name}
                                            className="h-24 w-24 rounded-md object-cover"
                                        />
                                    </Link>

                                    {/* Product Info */}
                                    <div className="min-w-0 flex-1">
                                        <Link
                                            href={`/product/${item.product.slug}`}
                                        >
                                            <h3 className="truncate font-medium text-gray-900 hover:text-orange-500">
                                                {item.product.name}
                                            </h3>
                                        </Link>

                                        {item.variation && (
                                            <p className="mt-1 text-sm text-gray-500">
                                                {item.variation.color?.name} /{' '}
                                                {item.variation.size?.name}
                                            </p>
                                        )}

                                        <p className="mt-2 font-semibold text-gray-900">
                                            {item.unit_price.toLocaleString(
                                                'pt-AO',
                                                {
                                                    style: 'currency',
                                                    currency: 'AOA',
                                                },
                                            )}
                                        </p>

                                        {/* Quantity Controls */}
                                        <div className="mt-4 flex items-center justify-between">
                                            <div className="flex items-center rounded-md border border-gray-300">
                                                <button
                                                    onClick={() =>
                                                        updateQuantity(
                                                            item.id,
                                                            item.quantity - 1,
                                                        )
                                                    }
                                                    disabled={
                                                        loading ||
                                                        item.quantity <= 1
                                                    }
                                                    className="p-2 text-gray-600 hover:text-orange-500 disabled:opacity-50"
                                                >
                                                    <Minus className="h-4 w-4" />
                                                </button>
                                                <span className="px-4 font-medium">
                                                    {item.quantity}
                                                </span>
                                                <button
                                                    onClick={() =>
                                                        updateQuantity(
                                                            item.id,
                                                            item.quantity + 1,
                                                        )
                                                    }
                                                    disabled={loading}
                                                    className="p-2 text-gray-600 hover:text-orange-500 disabled:opacity-50"
                                                >
                                                    <Plus className="h-4 w-4" />
                                                </button>
                                            </div>

                                            <button
                                                onClick={() =>
                                                    removeItem(item.id)
                                                }
                                                disabled={loading}
                                                className="p-2 text-gray-400 transition-colors hover:text-red-500"
                                            >
                                                <Trash2 className="h-5 w-5" />
                                            </button>
                                        </div>
                                    </div>

                                    {/* Item Subtotal */}
                                    <div className="text-right">
                                        <p className="font-semibold text-gray-900">
                                            {item.subtotal.toLocaleString(
                                                'pt-AO',
                                                {
                                                    style: 'currency',
                                                    currency: 'AOA',
                                                },
                                            )}
                                        </p>
                                    </div>
                                </div>
                            ))}
                        </div>

                        {/* Cart Summary */}
                        <div className="lg:col-span-1">
                            <div className="sticky top-24 rounded-lg bg-gray-50 p-6">
                                <h2 className="mb-4 text-lg font-semibold text-gray-900">
                                    Resumo do Pedido
                                </h2>

                                <div className="mb-4 space-y-3 border-b border-gray-200 pb-4">
                                    <div className="flex justify-between text-gray-600">
                                        <span>
                                            Subtotal ({items.length} produtos)
                                        </span>
                                        <span>
                                            {(
                                                cart?.subtotal || 0
                                            ).toLocaleString('pt-AO', {
                                                style: 'currency',
                                                currency: 'AOA',
                                            })}
                                        </span>
                                    </div>
                                    <div className="flex justify-between text-gray-600">
                                        <span>Entrega</span>
                                        <span className="text-green-600">
                                            A calcular
                                        </span>
                                    </div>
                                </div>

                                <div className="mb-6 flex justify-between text-lg font-semibold text-gray-900">
                                    <span>Total</span>
                                    <span>
                                        {(cart?.total || 0).toLocaleString(
                                            'pt-AO',
                                            {
                                                style: 'currency',
                                                currency: 'AOA',
                                            },
                                        )}
                                    </span>
                                </div>

                                <button
                                    onClick={checkoutViaWhatsApp}
                                    disabled={loading}
                                    className="flex w-full items-center justify-center gap-2 rounded-full bg-green-500 px-6 py-3 font-medium text-white transition-colors hover:bg-green-600 disabled:opacity-50"
                                >
                                    <svg
                                        className="h-5 w-5"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 0 01-9.87 5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                    </svg>
                                    Finalizar via WhatsApp
                                </button>

                                <p className="mt-4 text-center text-xs text-gray-500">
                                    Ao finalizar, será redirecionado para o
                                    WhatsApp para confirmar o pedido.
                                </p>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </StorefrontLayout>
    );
}
