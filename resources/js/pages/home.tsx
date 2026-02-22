import { Link, usePage } from '@inertiajs/react';
import {
    ChevronRight,
    ArrowRight,
    Sparkles,
    TrendingUp,
    Clock,
    Tag,
} from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import { ProductCard } from '@/components/storefront/product-card';
import { CategoryCard } from '@/components/storefront/category-card';
import type { PageProps } from '@/types';

interface HeroBanner {
    id: number;
    title: string | null;
    subtitle: string | null;
    cta_text: string | null;
    cta_link: string | null;
    file_path: string;
}

interface HomeProps {
    heroBanners: HeroBanner[];
    categories: Array<{
        id: number;
        name: string;
        slug: string;
        subcategories: Array<{ id: number; name: string; slug: string }>;
    }>;
    subcategories: Array<{
        id: number;
        name: string;
        slug: string;
        image_path: string | null;
    }>;
    featuredProducts: Array<import('@/types/storefront').Product>;
    trendingProducts: Array<import('@/types/storefront').Product>;
    newProducts: Array<import('@/types/storefront').Product>;
    saleProducts: Array<import('@/types/storefront').Product>;
    promoBanners: HeroBanner[];
}

export default function Home() {
    const {
        heroBanners,
        categories,
        subcategories,
        featuredProducts,
        trendingProducts,
        newProducts,
        saleProducts,
        promoBanners,
    } = usePage<PageProps & HomeProps>().props;

    const defaultBanners = [
        {
            id: 0,
            title: 'Nova Coleção Verão 2026',
            subtitle: 'Encontre o look perfeito para esta estação',
            cta_text: 'Ver Coleção',
            cta_link: '/shop',
            file_path:
                'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=1200&h=600&fit=crop',
        },
        {
            id: 1,
            title: 'Promoções de Inverno',
            subtitle: 'Até 50% de desconto em seleccionados',
            cta_text: 'Ver Promoções',
            cta_link: '/shop?filter[on_sale]=1',
            file_path:
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1200&h=600&fit=crop',
        },
    ];

    const displayBanners =
        heroBanners.length > 0 ? heroBanners : defaultBanners;
    const currentBanner = displayBanners[0];

    return (
        <StorefrontLayout>
            {/* Hero Banner */}
            <section className="relative bg-gray-900">
                <div className="relative h-[50vh] max-h-[600px] min-h-[400px]">
                    <img
                        src={currentBanner.file_path}
                        alt={currentBanner.title || 'Teu Estilo'}
                        className="h-full w-full object-cover"
                    />
                    <div className="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent" />

                    <div className="absolute inset-0 flex items-center">
                        <div className="container mx-auto px-4">
                            <div className="max-w-xl">
                                {currentBanner.subtitle && (
                                    <p className="mb-2 flex items-center gap-2 font-medium text-orange-400">
                                        <Sparkles className="h-4 w-4" />
                                        {currentBanner.subtitle}
                                    </p>
                                )}
                                <h1 className="mb-4 text-4xl font-bold text-white md:text-5xl lg:text-6xl">
                                    {currentBanner.title ||
                                        'Bem-vinda ao Teu Estilo'}
                                </h1>
                                {currentBanner.cta_text && (
                                    <Link
                                        href={currentBanner.cta_link || '/shop'}
                                        className="inline-flex items-center gap-2 rounded-full bg-orange-500 px-6 py-3 font-medium text-white transition-colors hover:bg-orange-600"
                                    >
                                        {currentBanner.cta_text}
                                        <ArrowRight className="h-5 w-5" />
                                    </Link>
                                )}
                            </div>
                        </div>
                    </div>
                </div>

                {/* Banner Indicators */}
                {displayBanners.length > 1 && (
                    <div className="absolute bottom-4 left-1/2 flex -translate-x-1/2 gap-2">
                        {displayBanners.map((_, index) => (
                            <button
                                key={index}
                                className={`h-2 w-2 rounded-full transition-colors ${
                                    index === 0 ? 'bg-white' : 'bg-white/50'
                                }`}
                                aria-label={`Ver banner ${index + 1}`}
                            />
                        ))}
                    </div>
                )}
            </section>

            {/* Categories Grid */}
            <section className="bg-gray-50 py-12">
                <div className="container mx-auto px-4">
                    <div className="mb-8 flex items-center justify-between">
                        <h2 className="text-2xl font-bold text-gray-900">
                            Categorias
                        </h2>
                        <Link
                            href="/shop"
                            className="flex items-center gap-1 font-medium text-orange-500 hover:text-orange-600"
                        >
                            Ver todas <ChevronRight className="h-4 w-4" />
                        </Link>
                    </div>

                    <div className="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                        {subcategories.slice(0, 10).map((subcategory) => (
                            <CategoryCard
                                key={subcategory.id}
                                category={subcategory}
                            />
                        ))}
                    </div>
                </div>
            </section>

            {/* Featured Products */}
            {featuredProducts.length > 0 && (
                <section className="py-12">
                    <div className="container mx-auto px-4">
                        <div className="mb-8 flex items-center justify-between">
                            <div className="flex items-center gap-2">
                                <Sparkles className="h-6 w-6 text-orange-500" />
                                <h2 className="text-2xl font-bold text-gray-900">
                                    Destaques
                                </h2>
                            </div>
                            <Link
                                href="/shop?filter[featured]=1"
                                className="flex items-center gap-1 font-medium text-orange-500 hover:text-orange-600"
                            >
                                Ver todos <ChevronRight className="h-4 w-4" />
                            </Link>
                        </div>

                        <div className="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            {featuredProducts.slice(0, 12).map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Promo Banner */}
            {promoBanners.length > 0 && (
                <section className="py-8">
                    <div className="container mx-auto px-4">
                        <div className="grid grid-cols-1 gap-4 md:grid-cols-3">
                            {promoBanners.slice(0, 3).map((banner) => (
                                <Link
                                    key={banner.id}
                                    href={banner.cta_link || '/shop'}
                                    className="group relative aspect-[3/1] overflow-hidden rounded-xl"
                                >
                                    <img
                                        src={banner.file_path}
                                        alt={banner.title || 'Promoção'}
                                        className="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                    />
                                    <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent" />
                                    <div className="absolute right-4 bottom-4 left-4">
                                        <h3 className="text-lg font-semibold text-white">
                                            {banner.title}
                                        </h3>
                                        {banner.subtitle && (
                                            <p className="text-sm text-white/80">
                                                {banner.subtitle}
                                            </p>
                                        )}
                                    </div>
                                </Link>
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* New Products */}
            {newProducts.length > 0 && (
                <section className="bg-gray-50 py-12">
                    <div className="container mx-auto px-4">
                        <div className="mb-8 flex items-center justify-between">
                            <div className="flex items-center gap-2">
                                <Clock className="h-6 w-6 text-orange-500" />
                                <h2 className="text-2xl font-bold text-gray-900">
                                    Novidades
                                </h2>
                            </div>
                            <Link
                                href="/shop?filter[new]=1"
                                className="flex items-center gap-1 font-medium text-orange-500 hover:text-orange-600"
                            >
                                Ver todos <ChevronRight className="h-4 w-4" />
                            </Link>
                        </div>

                        <div className="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            {newProducts.slice(0, 12).map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Trending Products */}
            {trendingProducts.length > 0 && (
                <section className="py-12">
                    <div className="container mx-auto px-4">
                        <div className="mb-8 flex items-center justify-between">
                            <div className="flex items-center gap-2">
                                <TrendingUp className="h-6 w-6 text-pink-500" />
                                <h2 className="text-2xl font-bold text-gray-900">
                                    Mais Vendidos
                                </h2>
                            </div>
                            <Link
                                href="/shop?filter[trending]=1"
                                className="flex items-center gap-1 font-medium text-orange-500 hover:text-orange-600"
                            >
                                Ver todos <ChevronRight className="h-4 w-4" />
                            </Link>
                        </div>

                        <div className="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            {trendingProducts.slice(0, 12).map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* Sale Products */}
            {saleProducts.length > 0 && (
                <section className="bg-gradient-to-br from-red-50 to-orange-50 py-12">
                    <div className="container mx-auto px-4">
                        <div className="mb-8 flex items-center justify-between">
                            <div className="flex items-center gap-2">
                                <Tag className="h-6 w-6 text-red-500" />
                                <h2 className="text-2xl font-bold text-gray-900">
                                    Promoções
                                </h2>
                            </div>
                            <Link
                                href="/shop?filter[on_sale]=1"
                                className="flex items-center gap-1 font-medium text-orange-500 hover:text-orange-600"
                            >
                                Ver todos <ChevronRight className="h-4 w-4" />
                            </Link>
                        </div>

                        <div className="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
                            {saleProducts.slice(0, 12).map((product) => (
                                <ProductCard
                                    key={product.id}
                                    product={product}
                                />
                            ))}
                        </div>
                    </div>
                </section>
            )}

            {/* CTA Section */}
            <section className="bg-gray-900 py-16">
                <div className="container mx-auto px-4">
                    <div className="mx-auto max-w-2xl text-center">
                        <h2 className="mb-4 text-3xl font-bold text-white">
                            Precisa de ajuda para encontrar o look perfeito?
                        </h2>
                        <p className="mb-8 text-gray-400">
                            Fale connosco via WhatsApp. A nossa equipa está
                            pronta para ajudar!
                        </p>
                        <a
                            href="https://wa.me/244923456789"
                            target="_blank"
                            rel="noopener noreferrer"
                            className="inline-flex items-center gap-2 rounded-full bg-green-500 px-8 py-3 font-medium text-white transition-colors hover:bg-green-600"
                        >
                            <svg
                                className="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 0 01-9.87 5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Falar no WhatsApp
                        </a>
                    </div>
                </div>
            </section>
        </StorefrontLayout>
    );
}
