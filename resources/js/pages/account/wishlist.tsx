import { Link, usePage } from '@inertiajs/react';
import { Heart, Trash2, ShoppingBag } from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import { ProductCard } from '@/components/storefront/product-card';
import type { PageProps, WishlistItem } from '@/types';

interface WishlistPageProps {
    wishlistItems: {
        data: WishlistItem[];
        current_page: number;
        last_page: number;
        total: number;
    };
}

export default function WishlistPage() {
    const { wishlistItems } = usePage<PageProps & WishlistPageProps>().props;
    const items = wishlistItems?.data || [];
    const isEmpty = items.length === 0;

    const handleRemove = async (itemId: number) => {
        try {
            await fetch(`/wishlist/remove/${itemId}`, {
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
            console.error('Error removing from wishlist:', error);
        }
    };

    const handleAddToCart = async (productId: number, variationId?: number) => {
        try {
            await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN':
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute('content') || '',
                },
                body: JSON.stringify({
                    product_id: productId,
                    variation_id: variationId || null,
                    quantity: 1,
                }),
            });
            window.location.href = '/cart';
        } catch (error) {
            console.error('Error adding to cart:', error);
        }
    };

    return (
        <StorefrontLayout title="Favoritos | Teu Estilo">
            <div className="container mx-auto px-4 py-8">
                <h1 className="mb-8 text-2xl font-bold text-gray-900">
                    Os Meus Favoritos
                </h1>

                {isEmpty ? (
                    <div className="py-16 text-center">
                        <Heart className="mx-auto mb-4 h-16 w-16 text-gray-300" />
                        <h2 className="mb-2 text-xl font-semibold text-gray-900">
                            Ainda não tem favoritos
                        </h2>
                        <p className="mb-8 text-gray-500">
                            Guarde os produtos que mais gosta para não os perder
                            de vista!
                        </p>
                        <Link
                            href="/shop"
                            className="inline-flex items-center gap-2 rounded-full bg-orange-500 px-6 py-3 font-medium text-white transition-colors hover:bg-orange-600"
                        >
                            <ShoppingBag className="h-5 w-5" />
                            Explorar Produtos
                        </Link>
                    </div>
                ) : (
                    <div className="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                        {items.map(
                            (item) =>
                                item.product && (
                                    <div
                                        key={item.id}
                                        className="group relative"
                                    >
                                        <ProductCard product={item.product} />

                                        {/* Remove Button */}
                                        <button
                                            onClick={() =>
                                                handleRemove(item.id)
                                            }
                                            className="absolute top-2 right-2 rounded-full bg-white p-2 text-gray-400 opacity-0 shadow-md transition-colors group-hover:opacity-100 hover:text-red-500"
                                        >
                                            <Trash2 className="h-4 w-4" />
                                        </button>

                                        {/* Quick Add Button */}
                                        <button
                                            onClick={() =>
                                                handleAddToCart(
                                                    item.product!.id,
                                                    item.variation?.id,
                                                )
                                            }
                                            className="absolute bottom-16 left-1/2 -translate-x-1/2 rounded-full bg-orange-500 px-4 py-2 text-sm font-medium text-white opacity-0 shadow-lg transition-all group-hover:opacity-100 hover:bg-orange-600"
                                        >
                                            Adicionar ao Carrinho
                                        </button>
                                    </div>
                                ),
                        )}
                    </div>
                )}
            </div>
        </StorefrontLayout>
    );
}
