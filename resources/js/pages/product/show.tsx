import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import {
    Heart,
    Share2,
    Truck,
    Shield,
    RefreshCw,
    ChevronRight,
    Minus,
    Plus,
    ShoppingBag,
} from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import { ProductCard } from '@/components/storefront/product-card';
import { cn } from '@/lib/utils';
import type { PageProps, Product, Color, Size } from '@/types';

interface ProductPageProps {
    product: Product;
    relatedProducts: Product[];
}

export default function ProductShow() {
    const { product, relatedProducts } = usePage<PageProps & ProductPageProps>()
        .props;

    const [selectedColor, setSelectedColor] = useState<Color | null>(
        product.colors?.[0] || null,
    );
    const [selectedSize, setSelectedSize] = useState<Size | null>(
        product.sizes?.[0] || null,
    );
    const [quantity, setQuantity] = useState(1);
    const [activeTab, setActiveTab] = useState<
        'description' | 'specs' | 'shipping'
    >('description');
    const [selectedImage, setSelectedImage] = useState(0);

    const finalPrice =
        product.discount_percentage > 0
            ? product.price_sell * (1 - product.discount_percentage / 100)
            : product.price_sell;

    const productImages =
        product.images?.length > 0
            ? product.images.map((img) => img.file_path)
            : [
                  'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=800&h=1000&fit=crop',
              ];

    const handleAddToCart = async () => {
        // Find variation
        const variation = product.variations?.find(
            (v) =>
                v.color_id === selectedColor?.id &&
                v.size_id === selectedSize?.id,
        );

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
                    product_id: product.id,
                    variation_id: variation?.id || null,
                    quantity: quantity,
                }),
            });
            window.location.href = '/cart';
        } catch (error) {
            console.error('Error adding to cart:', error);
        }
    };

    return (
        <StorefrontLayout title={`${product.name} | Teu Estilo`}>
            <div className="container mx-auto px-4 py-8">
                {/* Breadcrumb */}
                <nav className="mb-6 text-sm text-gray-500">
                    <Link href="/" className="hover:text-orange-500">
                        Início
                    </Link>
                    <ChevronRight className="mx-1 inline h-4 w-4" />
                    <Link href="/shop" className="hover:text-orange-500">
                        Loja
                    </Link>
                    {product.subcategory && (
                        <>
                            <ChevronRight className="mx-1 inline h-4 w-4" />
                            <Link
                                href={`/shop/${product.subcategory.slug}`}
                                className="hover:text-orange-500"
                            >
                                {product.subcategory.name}
                            </Link>
                        </>
                    )}
                    <ChevronRight className="mx-1 inline h-4 w-4" />
                    <span className="text-gray-900">{product.name}</span>
                </nav>

                <div className="grid grid-cols-1 gap-12 lg:grid-cols-2">
                    {/* Image Gallery */}
                    <div className="space-y-4">
                        {/* Main Image */}
                        <div className="aspect-[3/4] overflow-hidden rounded-xl bg-gray-100">
                            <img
                                src={productImages[selectedImage]}
                                alt={product.name}
                                className="h-full w-full object-cover"
                            />
                        </div>

                        {/* Thumbnails */}
                        {productImages.length > 1 && (
                            <div className="flex gap-2 overflow-x-auto">
                                {productImages.map((img, index) => (
                                    <button
                                        key={index}
                                        onClick={() => setSelectedImage(index)}
                                        className={cn(
                                            'h-24 w-20 shrink-0 overflow-hidden rounded-lg border-2 bg-gray-100 transition-colors',
                                            selectedImage === index
                                                ? 'border-orange-500'
                                                : 'border-transparent',
                                        )}
                                    >
                                        <img
                                            src={img}
                                            alt=""
                                            className="h-full w-full object-cover"
                                        />
                                    </button>
                                ))}
                            </div>
                        )}
                    </div>

                    {/* Product Info */}
                    <div>
                        {/* Brand */}
                        {product.brand && (
                            <p className="mb-2 text-sm tracking-wide text-gray-500 uppercase">
                                {product.brand.name}
                            </p>
                        )}

                        {/* Name */}
                        <h1 className="mb-4 text-2xl font-bold text-gray-900 md:text-3xl">
                            {product.name}
                        </h1>

                        {/* Badges */}
                        <div className="mb-4 flex gap-2">
                            {product.is_new && (
                                <span className="rounded bg-orange-500 px-2 py-1 text-xs font-medium text-white">
                                    NOVO
                                </span>
                            )}
                            {product.discount_percentage > 0 && (
                                <span className="rounded bg-red-500 px-2 py-1 text-xs font-medium text-white">
                                    -{product.discount_percentage}% DESCONTO
                                </span>
                            )}
                            {product.is_trending && (
                                <span className="rounded bg-pink-500 px-2 py-1 text-xs font-medium text-white">
                                    🔥 Tendência
                                </span>
                            )}
                        </div>

                        {/* Price */}
                        <div className="mb-6 flex items-center gap-3">
                            <span
                                className={cn(
                                    'text-3xl font-bold',
                                    product.discount_percentage > 0
                                        ? 'text-red-500'
                                        : 'text-gray-900',
                                )}
                            >
                                {finalPrice.toLocaleString('pt-AO', {
                                    style: 'currency',
                                    currency: 'AOA',
                                })}
                            </span>
                            {product.discount_percentage > 0 && (
                                <span className="text-xl text-gray-400 line-through">
                                    {product.price_sell.toLocaleString(
                                        'pt-AO',
                                        { style: 'currency', currency: 'AOA' },
                                    )}
                                </span>
                            )}
                        </div>

                        {/* Color Selection */}
                        {product.colors && product.colors.length > 0 && (
                            <div className="mb-6">
                                <h3 className="mb-3 text-sm font-medium text-gray-900">
                                    Cor:{' '}
                                    <span className="font-normal text-gray-500">
                                        {selectedColor?.name}
                                    </span>
                                </h3>
                                <div className="flex gap-2">
                                    {product.colors.map((color) => (
                                        <button
                                            key={color.id}
                                            onClick={() =>
                                                setSelectedColor(color)
                                            }
                                            className={cn(
                                                'h-10 w-10 rounded-full border-2 transition-all',
                                                selectedColor?.id === color.id
                                                    ? 'scale-110 border-orange-500'
                                                    : 'border-gray-200 hover:border-gray-300',
                                            )}
                                            style={{
                                                backgroundColor: color.hex_code,
                                            }}
                                            title={color.name}
                                        />
                                    ))}
                                </div>
                            </div>
                        )}

                        {/* Size Selection */}
                        {product.sizes && product.sizes.length > 0 && (
                            <div className="mb-6">
                                <h3 className="mb-3 text-sm font-medium text-gray-900">
                                    Tamanho:{' '}
                                    <span className="font-normal text-gray-500">
                                        {selectedSize?.name}
                                    </span>
                                </h3>
                                <div className="flex flex-wrap gap-2">
                                    {product.sizes.map((size) => (
                                        <button
                                            key={size.id}
                                            onClick={() =>
                                                setSelectedSize(size)
                                            }
                                            className={cn(
                                                'min-w-[48px] rounded-lg border px-3 py-2 text-sm font-medium transition-colors',
                                                selectedSize?.id === size.id
                                                    ? 'border-orange-500 bg-orange-50 text-orange-600'
                                                    : 'border-gray-300 text-gray-700 hover:border-gray-400',
                                            )}
                                        >
                                            {size.name}
                                        </button>
                                    ))}
                                </div>
                            </div>
                        )}

                        {/* Quantity */}
                        <div className="mb-6">
                            <h3 className="mb-3 text-sm font-medium text-gray-900">
                                Quantidade
                            </h3>
                            <div className="flex w-fit items-center rounded-lg border border-gray-300">
                                <button
                                    onClick={() =>
                                        setQuantity(Math.max(1, quantity - 1))
                                    }
                                    className="p-3 text-gray-600 hover:text-orange-500"
                                >
                                    <Minus className="h-4 w-4" />
                                </button>
                                <span className="px-6 font-medium">
                                    {quantity}
                                </span>
                                <button
                                    onClick={() => setQuantity(quantity + 1)}
                                    className="p-3 text-gray-600 hover:text-orange-500"
                                >
                                    <Plus className="h-4 w-4" />
                                </button>
                            </div>
                        </div>

                        {/* Add to Cart */}
                        <div className="mb-8 flex gap-4">
                            <button
                                onClick={handleAddToCart}
                                className="flex flex-1 items-center justify-center gap-2 rounded-full bg-orange-500 px-6 py-4 font-medium text-white transition-colors hover:bg-orange-600"
                            >
                                <ShoppingBag className="h-5 w-5" />
                                Adicionar ao Carrinho
                            </button>
                            <button className="rounded-full border border-gray-300 p-4 transition-colors hover:border-orange-500 hover:text-orange-500">
                                <Heart className="h-5 w-5" />
                            </button>
                            <button className="rounded-full border border-gray-300 p-4 transition-colors hover:border-orange-500 hover:text-orange-500">
                                <Share2 className="h-5 w-5" />
                            </button>
                        </div>

                        {/* Benefits */}
                        <div className="mb-8 grid grid-cols-3 gap-4 border-t border-b border-gray-200 py-6">
                            <div className="text-center">
                                <Truck className="mx-auto mb-2 h-6 w-6 text-gray-400" />
                                <p className="text-xs text-gray-600">
                                    Entrega em Angola
                                </p>
                            </div>
                            <div className="text-center">
                                <Shield className="mx-auto mb-2 h-6 w-6 text-gray-400" />
                                <p className="text-xs text-gray-600">
                                    Compra Segura
                                </p>
                            </div>
                            <div className="text-center">
                                <RefreshCw className="mx-auto mb-2 h-6 w-6 text-gray-400" />
                                <p className="text-xs text-gray-600">
                                    7 Dias para Troca
                                </p>
                            </div>
                        </div>

                        {/* Tabs */}
                        <div>
                            <div className="mb-4 flex border-b border-gray-200">
                                <button
                                    onClick={() => setActiveTab('description')}
                                    className={cn(
                                        'border-b-2 px-4 py-3 text-sm font-medium transition-colors',
                                        activeTab === 'description'
                                            ? 'border-orange-500 text-orange-600'
                                            : 'border-transparent text-gray-500 hover:text-gray-700',
                                    )}
                                >
                                    Descrição
                                </button>
                                <button
                                    onClick={() => setActiveTab('specs')}
                                    className={cn(
                                        'border-b-2 px-4 py-3 text-sm font-medium transition-colors',
                                        activeTab === 'specs'
                                            ? 'border-orange-500 text-orange-600'
                                            : 'border-transparent text-gray-500 hover:text-gray-700',
                                    )}
                                >
                                    Especificações
                                </button>
                                <button
                                    onClick={() => setActiveTab('shipping')}
                                    className={cn(
                                        'border-b-2 px-4 py-3 text-sm font-medium transition-colors',
                                        activeTab === 'shipping'
                                            ? 'border-orange-500 text-orange-600'
                                            : 'border-transparent text-gray-500 hover:text-gray-700',
                                    )}
                                >
                                    Entrega
                                </button>
                            </div>

                            {activeTab === 'description' && (
                                <div className="text-sm leading-relaxed text-gray-600">
                                    {product.description ||
                                        product.short_description ||
                                        'Sem descrição disponível.'}
                                </div>
                            )}

                            {activeTab === 'specs' && (
                                <div className="space-y-2 text-sm">
                                    {product.materials &&
                                        product.materials.length > 0 && (
                                            <div className="flex">
                                                <span className="w-24 text-gray-500">
                                                    Material:
                                                </span>
                                                <span className="text-gray-900">
                                                    {product.materials
                                                        .map((m) => m.name)
                                                        .join(', ')}
                                                </span>
                                            </div>
                                        )}
                                    {product.brand && (
                                        <div className="flex">
                                            <span className="w-24 text-gray-500">
                                                Marca:
                                            </span>
                                            <span className="text-gray-900">
                                                {product.brand.name}
                                            </span>
                                        </div>
                                    )}
                                    {product.sku && (
                                        <div className="flex">
                                            <span className="w-24 text-gray-500">
                                                SKU:
                                            </span>
                                            <span className="text-gray-900">
                                                {product.sku}
                                            </span>
                                        </div>
                                    )}
                                </div>
                            )}

                            {activeTab === 'shipping' && (
                                <div className="text-sm leading-relaxed text-gray-600">
                                    <p className="mb-2">
                                        Entregamos em toda Angola, incluindo
                                        Luanda, Benguela, Huambo e outras
                                        províncias.
                                    </p>
                                    <p>
                                        O tempo de entrega estimado é de 5-10
                                        dias úteis para Luanda e 10-20 dias
                                        úteis para as demais províncias.
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Related Products */}
                {relatedProducts.length > 0 && (
                    <section className="mt-16">
                        <h2 className="mb-8 text-2xl font-bold text-gray-900">
                            Produtos Relacionados
                        </h2>
                        <div className="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                            {relatedProducts
                                .slice(0, 6)
                                .map((relatedProduct) => (
                                    <ProductCard
                                        key={relatedProduct.id}
                                        product={relatedProduct}
                                    />
                                ))}
                        </div>
                    </section>
                )}
            </div>
        </StorefrontLayout>
    );
}
