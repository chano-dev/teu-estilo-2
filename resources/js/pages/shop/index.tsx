import { Link, usePage } from '@inertiajs/react';
import { useState } from 'react';
import { Filter, Grid3X3, Grid2X2, X, ChevronDown } from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import { ProductCard } from '@/components/storefront/product-card';
import { cn } from '@/lib/utils';
import type { PageProps, Product, Category } from '@/types';

interface ShopPageProps {
    products: {
        data: Product[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
        links: Array<{ url: string | null; label: string; active: boolean }>;
    };
    categories: Category[];
    filters: {
        filter?: Record<string, unknown>;
        search?: string;
        sort?: string;
        page?: number;
    };
}

const sortOptions = [
    { value: 'newest', label: 'Mais Recentes' },
    { value: 'price_asc', label: 'Preço: Menor para Maior' },
    { value: 'price_desc', label: 'Preço: Maior para Menor' },
    { value: 'popular', label: 'Mais Populares' },
];

export default function ShopIndex() {
    const { products, categories, filters } = usePage<
        PageProps & ShopPageProps
    >().props;
    const [viewMode, setViewMode] = useState<'grid' | 'list'>('grid');
    const [mobileFiltersOpen, setMobileFiltersOpen] = useState(false);
    const [currentSort, setCurrentSort] = useState(filters.sort || 'newest');

    const handleSortChange = (sort: string) => {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', sort);
        window.location.href = url.toString();
    };

    const activeCategory = categories.find((c) =>
        c.subcategories?.some((sc) => window.location.href.includes(sc.slug)),
    );

    return (
        <StorefrontLayout title="Loja | Teu Estilo">
            <div className="container mx-auto px-4 py-8">
                {/* Breadcrumb */}
                <nav className="mb-6 text-sm text-gray-500">
                    <Link href="/" className="hover:text-orange-500">
                        Início
                    </Link>
                    <span className="mx-2">/</span>
                    <span className="text-gray-900">Loja</span>
                </nav>

                <div className="flex gap-8">
                    {/* Sidebar Filters - Desktop */}
                    <aside className="hidden w-64 shrink-0 lg:block">
                        <div className="sticky top-24">
                            <h2 className="mb-4 font-semibold text-gray-900">
                                Categorias
                            </h2>
                            <ul className="space-y-2">
                                <li>
                                    <Link
                                        href="/shop"
                                        className={cn(
                                            'block rounded-lg px-3 py-2 text-sm transition-colors',
                                            !activeCategory
                                                ? 'bg-orange-50 font-medium text-orange-600'
                                                : 'text-gray-600 hover:bg-gray-50',
                                        )}
                                    >
                                        Todos os Produtos
                                    </Link>
                                </li>
                                {categories.map((category) => (
                                    <li key={category.id}>
                                        <Link
                                            href={`/shop/${category.slug}`}
                                            className={cn(
                                                'block rounded-lg px-3 py-2 text-sm transition-colors',
                                                activeCategory?.id ===
                                                    category.id
                                                    ? 'bg-orange-50 font-medium text-orange-600'
                                                    : 'text-gray-600 hover:bg-gray-50',
                                            )}
                                        >
                                            {category.name}
                                        </Link>
                                        {activeCategory?.id === category.id &&
                                            category.subcategories && (
                                                <ul className="mt-1 ml-4 space-y-1">
                                                    {category.subcategories.map(
                                                        (sub) => (
                                                            <li key={sub.id}>
                                                                <Link
                                                                    href={`/shop/${category.slug}/${sub.slug}`}
                                                                    className="block px-3 py-1.5 text-sm text-gray-500 hover:text-orange-500"
                                                                >
                                                                    {sub.name}
                                                                </Link>
                                                            </li>
                                                        ),
                                                    )}
                                                </ul>
                                            )}
                                    </li>
                                ))}
                            </ul>

                            {/* Price Filter */}
                            <div className="mt-8">
                                <h3 className="mb-4 font-semibold text-gray-900">
                                    Preço
                                </h3>
                                <div className="space-y-2">
                                    <label className="flex cursor-pointer items-center gap-2">
                                        <input
                                            type="checkbox"
                                            className="rounded text-orange-500"
                                        />
                                        <span className="text-sm text-gray-600">
                                            Menos de 5.000 Kz
                                        </span>
                                    </label>
                                    <label className="flex cursor-pointer items-center gap-2">
                                        <input
                                            type="checkbox"
                                            className="rounded text-orange-500"
                                        />
                                        <span className="text-sm text-gray-600">
                                            5.000 - 10.000 Kz
                                        </span>
                                    </label>
                                    <label className="flex cursor-pointer items-center gap-2">
                                        <input
                                            type="checkbox"
                                            className="rounded text-orange-500"
                                        />
                                        <span className="text-sm text-gray-600">
                                            10.000 - 20.000 Kz
                                        </span>
                                    </label>
                                    <label className="flex cursor-pointer items-center gap-2">
                                        <input
                                            type="checkbox"
                                            className="rounded text-orange-500"
                                        />
                                        <span className="text-sm text-gray-600">
                                            Mais de 20.000 Kz
                                        </span>
                                    </label>
                                </div>
                            </div>

                            {/* Sale Filter */}
                            <div className="mt-8">
                                <label className="flex cursor-pointer items-center gap-2">
                                    <input
                                        type="checkbox"
                                        className="rounded text-orange-500"
                                        checked={
                                            filters.filter?.on_sale === true
                                        }
                                        onChange={(e) => {
                                            const url = new URL(
                                                window.location.href,
                                            );
                                            if (e.target.checked) {
                                                url.searchParams.set(
                                                    'filter[on_sale]',
                                                    '1',
                                                );
                                            } else {
                                                url.searchParams.delete(
                                                    'filter[on_sale]',
                                                );
                                            }
                                            window.location.href =
                                                url.toString();
                                        }}
                                    />
                                    <span className="text-sm font-medium text-gray-900">
                                        Só Promoções
                                    </span>
                                </label>
                            </div>
                        </div>
                    </aside>

                    {/* Main Content */}
                    <div className="flex-1">
                        {/* Header */}
                        <div className="mb-6 flex items-center justify-between">
                            <div>
                                <h1 className="text-2xl font-bold text-gray-900">
                                    {filters.search
                                        ? `Resultados para "${filters.search}"`
                                        : 'Todos os Produtos'}
                                </h1>
                                <p className="mt-1 text-sm text-gray-500">
                                    {products.total} produtos encontrados
                                </p>
                            </div>

                            <div className="flex items-center gap-4">
                                {/* Sort Dropdown */}
                                <div className="relative">
                                    <select
                                        value={currentSort}
                                        onChange={(e) =>
                                            handleSortChange(e.target.value)
                                        }
                                        className="appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 pr-8 text-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-500"
                                    >
                                        {sortOptions.map((option) => (
                                            <option
                                                key={option.value}
                                                value={option.value}
                                            >
                                                {option.label}
                                            </option>
                                        ))}
                                    </select>
                                    <ChevronDown className="pointer-events-none absolute top-1/2 right-2 h-4 w-4 -translate-y-1/2 text-gray-500" />
                                </div>

                                {/* View Mode */}
                                <div className="hidden items-center gap-1 rounded-lg border border-gray-300 p-1 md:flex">
                                    <button
                                        onClick={() => setViewMode('grid')}
                                        className={cn(
                                            'rounded p-1.5',
                                            viewMode === 'grid'
                                                ? 'bg-gray-100'
                                                : 'hover:bg-gray-50',
                                        )}
                                    >
                                        <Grid3X3 className="h-4 w-4" />
                                    </button>
                                    <button
                                        onClick={() => setViewMode('list')}
                                        className={cn(
                                            'rounded p-1.5',
                                            viewMode === 'list'
                                                ? 'bg-gray-100'
                                                : 'hover:bg-gray-50',
                                        )}
                                    >
                                        <Grid2X2 className="h-4 w-4" />
                                    </button>
                                </div>

                                {/* Mobile Filter Button */}
                                <button
                                    onClick={() => setMobileFiltersOpen(true)}
                                    className="flex items-center gap-2 rounded-lg border border-gray-300 px-4 py-2 text-sm lg:hidden"
                                >
                                    <Filter className="h-4 w-4" />
                                    Filtros
                                </button>
                            </div>
                        </div>

                        {/* Products Grid */}
                        {products.data.length > 0 ? (
                            <>
                                <div
                                    className={cn(
                                        'gap-4',
                                        viewMode === 'grid'
                                            ? 'grid grid-cols-2 md:grid-cols-3'
                                            : 'grid grid-cols-1',
                                    )}
                                >
                                    {products.data.map((product) => (
                                        <ProductCard
                                            key={product.id}
                                            product={product}
                                        />
                                    ))}
                                </div>

                                {/* Pagination */}
                                {products.last_page > 1 && (
                                    <div className="mt-12 flex justify-center gap-2">
                                        {products.links.map((link, index) => (
                                            <Link
                                                key={index}
                                                href={link.url || '#'}
                                                className={cn(
                                                    'rounded-lg px-4 py-2 text-sm transition-colors',
                                                    link.active
                                                        ? 'bg-orange-500 text-white'
                                                        : 'border border-gray-300 bg-white text-gray-600 hover:bg-gray-50',
                                                    !link.url &&
                                                        'cursor-not-allowed opacity-50',
                                                )}
                                                disabled={!link.url}
                                            >
                                                {link.label
                                                    .replace('&laquo;', '«')
                                                    .replace('&raquo;', '»')}
                                            </Link>
                                        ))}
                                    </div>
                                )}
                            </>
                        ) : (
                            <div className="py-16 text-center">
                                <p className="mb-4 text-gray-500">
                                    Nenhum produto encontrado.
                                </p>
                                <Link
                                    href="/shop"
                                    className="font-medium text-orange-500 hover:text-orange-600"
                                >
                                    Ver todos os produtos
                                </Link>
                            </div>
                        )}
                    </div>
                </div>
            </div>

            {/* Mobile Filters Drawer */}
            {mobileFiltersOpen && (
                <div className="fixed inset-0 z-50 lg:hidden">
                    <div
                        className="absolute inset-0 bg-black/50"
                        onClick={() => setMobileFiltersOpen(false)}
                    />
                    <div className="absolute top-0 right-0 h-full w-80 overflow-y-auto bg-white p-6">
                        <div className="mb-6 flex items-center justify-between">
                            <h2 className="text-lg font-semibold">Filtros</h2>
                            <button onClick={() => setMobileFiltersOpen(false)}>
                                <X className="h-6 w-6" />
                            </button>
                        </div>

                        {/* Same filters as desktop */}
                        <div className="space-y-6">
                            <div>
                                <h3 className="mb-3 font-medium">Categorias</h3>
                                <ul className="space-y-2">
                                    <li>
                                        <Link
                                            href="/shop"
                                            className="text-sm text-gray-600 hover:text-orange-500"
                                        >
                                            Todos os Produtos
                                        </Link>
                                    </li>
                                    {categories.map((category) => (
                                        <li key={category.id}>
                                            <Link
                                                href={`/shop/${category.slug}`}
                                                className="text-sm text-gray-600 hover:text-orange-500"
                                            >
                                                {category.name}
                                            </Link>
                                        </li>
                                    ))}
                                </ul>
                            </div>

                            <button
                                onClick={() => setMobileFiltersOpen(false)}
                                className="w-full rounded-lg bg-orange-500 py-3 font-medium text-white"
                            >
                                Aplicar Filtros
                            </button>
                        </div>
                    </div>
                </div>
            )}
        </StorefrontLayout>
    );
}
