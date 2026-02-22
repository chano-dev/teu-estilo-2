import { Link } from '@inertiajs/react';
import { Heart, ShoppingBag } from 'lucide-react';
import { Badge } from '@/components/ui/badge';
import { cn } from '@/lib/utils';
import type { Product } from '@/types';

interface ProductCardProps {
    product: Product;
    className?: string;
}

export function ProductCard({ product, className }: ProductCardProps) {
    const finalPrice =
        product.discount_percentage > 0
            ? product.price_sell * (1 - product.discount_percentage / 100)
            : product.price_sell;

    const hasDiscount = product.discount_percentage > 0;
    const isOutOfStock = !product.variations?.some((v) => v.stock_quantity > 0);

    return (
        <div className={cn('group relative', className)}>
            <Link href={`/product/${product.slug}`}>
                {/* Image Container */}
                <div className="relative mb-3 aspect-[3/4] overflow-hidden rounded-lg bg-gray-100">
                    {/* Product Image */}
                    <img
                        src={
                            product.primary_image ||
                            product.images?.[0]?.file_path ||
                            'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400&h=533&fit=crop'
                        }
                        alt={product.name}
                        className="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                    />

                    {/* Badges */}
                    <div className="absolute top-2 left-2 flex flex-col gap-1">
                        {product.is_new && (
                            <span className="rounded bg-orange-500 px-2 py-0.5 text-xs font-medium text-white">
                                NOVO
                            </span>
                        )}
                        {hasDiscount && (
                            <span className="rounded bg-red-500 px-2 py-0.5 text-xs font-medium text-white">
                                -{product.discount_percentage}%
                            </span>
                        )}
                        {product.is_trending && (
                            <span className="rounded bg-pink-500 px-2 py-0.5 text-xs font-medium text-white">
                                🔥
                            </span>
                        )}
                    </div>

                    {/* Quick Actions */}
                    <div className="absolute top-2 right-2 flex flex-col gap-2 opacity-0 transition-opacity group-hover:opacity-100">
                        <button
                            className="rounded-full bg-white p-2 text-gray-600 shadow-md transition-colors hover:bg-orange-50 hover:text-orange-500"
                            aria-label="Adicionar aos favoritos"
                            onClick={(e) => {
                                e.preventDefault();
                                // Handle wishlist
                            }}
                        >
                            <Heart className="h-4 w-4" />
                        </button>
                        <button
                            className="rounded-full bg-white p-2 text-gray-600 shadow-md transition-colors hover:bg-orange-50 hover:text-orange-500"
                            aria-label="Ver produto"
                            onClick={(e) => {
                                e.preventDefault();
                            }}
                        >
                            <ShoppingBag className="h-4 w-4" />
                        </button>
                    </div>

                    {/* Out of Stock Overlay */}
                    {isOutOfStock && (
                        <div className="absolute inset-0 flex items-center justify-center bg-black/40">
                            <span className="rounded bg-gray-900 px-4 py-1.5 text-sm font-medium text-white">
                                Esgotado
                            </span>
                        </div>
                    )}
                </div>
            </Link>

            {/* Product Info */}
            <div className="space-y-1">
                {/* Brand */}
                {product.brand && (
                    <p className="text-xs tracking-wide text-gray-500 uppercase">
                        {product.brand.name}
                    </p>
                )}

                {/* Name */}
                <Link href={`/product/${product.slug}`}>
                    <h3 className="line-clamp-2 text-sm font-medium text-gray-900 transition-colors hover:text-orange-500">
                        {product.name}
                    </h3>
                </Link>

                {/* Price */}
                <div className="flex items-center gap-2">
                    <span
                        className={cn(
                            'font-semibold',
                            hasDiscount ? 'text-red-500' : 'text-gray-900',
                        )}
                    >
                        {finalPrice.toLocaleString('pt-AO', {
                            style: 'currency',
                            currency: 'AOA',
                        })}
                    </span>
                    {hasDiscount && (
                        <span className="text-sm text-gray-400 line-through">
                            {product.price_sell.toLocaleString('pt-AO', {
                                style: 'currency',
                                currency: 'AOA',
                            })}
                        </span>
                    )}
                </div>

                {/* Color Swatches (if available) */}
                {product.colors && product.colors.length > 0 && (
                    <div className="flex items-center gap-1 pt-1">
                        {product.colors.slice(0, 5).map((color) => (
                            <span
                                key={color.id}
                                className="h-4 w-4 rounded-full border border-gray-200"
                                style={{ backgroundColor: color.hex_code }}
                                title={color.name}
                            />
                        ))}
                        {product.colors.length > 5 && (
                            <span className="text-xs text-gray-400">
                                +{product.colors.length - 5}
                            </span>
                        )}
                    </div>
                )}
            </div>
        </div>
    );
}
