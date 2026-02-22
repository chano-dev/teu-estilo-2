import { Link, usePage } from '@inertiajs/react';
import { Search, ShoppingBag, User, Heart, Menu, X } from 'lucide-react';
import { useState } from 'react';
import { cn } from '@/lib/utils';
import type { PageProps } from '@/types';

interface StorefrontHeaderProps {
    onMenuClick: () => void;
}

export function StorefrontHeader({ onMenuClick }: StorefrontHeaderProps) {
    const { auth } = usePage<PageProps>().props;
    const [searchOpen, setSearchOpen] = useState(false);
    const [searchQuery, setSearchQuery] = useState('');

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        if (searchQuery.trim()) {
            window.location.href = `/shop?search=${encodeURIComponent(searchQuery)}`;
        }
    };

    return (
        <header className="sticky top-0 z-50 border-b border-gray-200 bg-white">
            {/* Top Banner */}
            <div className="bg-orange-500 py-1.5 text-center text-xs font-medium text-white">
                <span>
                    🎉 Frete Grátis em compras acima de 50.000 Kz | Entrega em
                    Angola
                </span>
            </div>

            {/* Main Header */}
            <div className="container mx-auto px-4">
                <div className="flex h-14 items-center justify-between lg:h-16">
                    {/* Mobile Menu Button */}
                    <button
                        onClick={onMenuClick}
                        className="-ml-2 p-2 text-gray-600 hover:text-gray-900 lg:hidden"
                        aria-label="Abrir menu"
                    >
                        <Menu className="h-6 w-6" />
                    </button>

                    {/* Logo */}
                    <Link href="/" className="flex items-center">
                        <span className="text-2xl font-bold text-gray-900">
                            TEU<span className="text-orange-500">ESTILO</span>
                        </span>
                    </Link>

                    {/* Desktop Navigation */}
                    <nav className="hidden items-center gap-6 lg:flex">
                        <Link
                            href="/shop"
                            className="text-sm font-medium text-gray-700 transition-colors hover:text-orange-500"
                        >
                            Novidades
                        </Link>
                        <Link
                            href="/shop?filter[new_arrivals]=1"
                            className="text-sm font-medium text-gray-700 transition-colors hover:text-orange-500"
                        >
                            Mais Vendidos
                        </Link>
                        <Link
                            href="/shop?filter[on_sale]=1"
                            className="text-sm font-medium text-orange-500 transition-colors hover:text-orange-600"
                        >
                            Promoção
                        </Link>
                    </nav>

                    {/* Search Bar - Desktop */}
                    <form
                        onSubmit={handleSearch}
                        className="mx-8 hidden max-w-md flex-1 lg:flex"
                    >
                        <div className="relative w-full">
                            <input
                                type="text"
                                placeholder="Pesquisar produtos..."
                                value={searchQuery}
                                onChange={(e) => setSearchQuery(e.target.value)}
                                className="w-full rounded-full border-0 bg-gray-100 py-2 pr-10 pl-4 text-sm transition-all focus:bg-white focus:ring-2 focus:ring-orange-500"
                            />
                            <button
                                type="submit"
                                className="absolute top-1/2 right-2 -translate-y-1/2 p-1.5 text-gray-500 hover:text-orange-500"
                            >
                                <Search className="h-4 w-4" />
                            </button>
                        </div>
                    </form>

                    {/* Icons */}
                    <div className="flex items-center gap-2">
                        {/* Mobile Search */}
                        <button
                            onClick={() => setSearchOpen(!searchOpen)}
                            className="p-2 text-gray-600 hover:text-gray-900 lg:hidden"
                            aria-label="Pesquisar"
                        >
                            <Search className="h-5 w-5" />
                        </button>

                        {/* Account */}
                        {auth.user ? (
                            <Link
                                href="/account"
                                className="p-2 text-gray-600 transition-colors hover:text-orange-500"
                                aria-label="Minha conta"
                            >
                                <User className="h-5 w-5" />
                            </Link>
                        ) : (
                            <Link
                                href="/login"
                                className="p-2 text-gray-600 transition-colors hover:text-orange-500"
                                aria-label="Entrar"
                            >
                                <User className="h-5 w-5" />
                            </Link>
                        )}

                        {/* Wishlist */}
                        <Link
                            href="/account/wishlist"
                            className="hidden p-2 text-gray-600 transition-colors hover:text-orange-500 sm:block"
                            aria-label="Favoritos"
                        >
                            <Heart className="h-5 w-5" />
                        </Link>

                        {/* Cart */}
                        <Link
                            href="/cart"
                            className="relative p-2 text-gray-600 transition-colors hover:text-orange-500"
                            aria-label="Carrinho"
                        >
                            <ShoppingBag className="h-5 w-5" />
                            <span className="absolute -top-0.5 -right-0.5 flex h-4 w-4 items-center justify-center rounded-full bg-orange-500 text-xs font-medium text-white">
                                0
                            </span>
                        </Link>
                    </div>
                </div>
            </div>

            {/* Mobile Search Bar */}
            {searchOpen && (
                <div className="border-t border-gray-200 bg-white p-4 lg:hidden">
                    <form onSubmit={handleSearch} className="flex gap-2">
                        <input
                            type="text"
                            placeholder="Pesquisar produtos..."
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                            className="flex-1 rounded-full border-0 bg-gray-100 px-4 py-2 text-sm focus:ring-2 focus:ring-orange-500"
                            autoFocus
                        />
                        <button
                            type="submit"
                            className="rounded-full bg-orange-500 px-4 py-2 text-sm font-medium text-white hover:bg-orange-600"
                        >
                            Pesquisar
                        </button>
                    </form>
                </div>
            )}

            {/* Category Navigation - Desktop */}
            <div className="hidden border-t border-gray-100 lg:block">
                <div className="container mx-auto px-4">
                    <nav className="flex h-10 items-center gap-8 overflow-x-auto">
                        <Link
                            href="/shop"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Todos os Produtos
                        </Link>
                        <Link
                            href="/shop/vestidos"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Vestidos
                        </Link>
                        <Link
                            href="/shop/blusas"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Blusas
                        </Link>
                        <Link
                            href="/shop/saias"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Saias
                        </Link>
                        <Link
                            href="/shop/calcas"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Calças
                        </Link>
                        <Link
                            href="/shop/blazers"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Blazers
                        </Link>
                        <Link
                            href="/shop/conjuntos"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Conjuntos
                        </Link>
                        <Link
                            href="/shop/fatos-de-banho"
                            className="text-sm whitespace-nowrap text-gray-600 hover:text-orange-500"
                        >
                            Fatos de Banho
                        </Link>
                    </nav>
                </div>
            </div>
        </header>
    );
}
