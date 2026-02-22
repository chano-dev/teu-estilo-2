import { Link, usePage } from '@inertiajs/react';
import {
    X,
    Home,
    User,
    Heart,
    ShoppingBag,
    Sparkles,
    Scissors,
    Crown,
} from 'lucide-react';
import { cn } from '@/lib/utils';
import type { PageProps } from '@/types';

interface StorefrontMobileNavProps {
    isOpen: boolean;
    onClose: () => void;
}

export function StorefrontMobileNav({
    isOpen,
    onClose,
}: StorefrontMobileNavProps) {
    const { auth } = usePage<PageProps>().props;

    const categories = [
        { name: 'Vestidos', href: '/shop/vestidos', slug: 'vestidos' },
        { name: 'Blusas', href: '/shop/blusas', slug: 'blusas' },
        { name: 'Saias', href: '/shop/saias', slug: 'saias' },
        { name: 'Calças', href: '/shop/calcas', slug: 'calcas' },
        { name: 'Blazers', href: '/shop/blazers', slug: 'blazers' },
        { name: 'Conjuntos', href: '/shop/conjuntos', slug: 'conjuntos' },
        {
            name: 'Fatos de Banho',
            href: '/shop/fatos-de-banho',
            slug: 'fatos-de-banho',
        },
        { name: 'Casacos', href: '/shop/casacos', slug: 'casacos' },
    ];

    const services = [
        {
            name: 'Compras Shein',
            href: '/servicos/compras-shein',
            icon: ShoppingBag,
        },
        { name: 'Perucas', href: '/servicos/perucas', icon: Crown },
        { name: 'Costura', href: '/servicos/costura', icon: Scissors },
        { name: 'Aluguer', href: '/servicos/aluguer', icon: Sparkles },
    ];

    return (
        <>
            {/* Overlay */}
            <div
                className={cn(
                    'fixed inset-0 z-50 bg-black/50 transition-opacity duration-300 lg:hidden',
                    isOpen ? 'opacity-100' : 'pointer-events-none opacity-0',
                )}
                onClick={onClose}
            />

            {/* Slide-in Panel */}
            <div
                className={cn(
                    'fixed inset-y-0 left-0 z-50 w-80 max-w-[85vw] bg-white transition-transform duration-300 ease-out lg:hidden',
                    isOpen ? 'translate-x-0' : '-translate-x-full',
                )}
            >
                {/* Header */}
                <div className="flex items-center justify-between border-b p-4">
                    <Link
                        href="/"
                        onClick={onClose}
                        className="text-xl font-bold text-gray-900"
                    >
                        TEU<span className="text-orange-500">ESTILO</span>
                    </Link>
                    <button
                        onClick={onClose}
                        className="p-2 text-gray-500 hover:text-gray-700"
                        aria-label="Fechar menu"
                    >
                        <X className="h-6 w-6" />
                    </button>
                </div>

                {/* Scrollable Content */}
                <div className="h-[calc(100vh-140px)] overflow-y-auto pb-20">
                    {/* Main Nav */}
                    <nav className="p-4">
                        <Link
                            href="/shop"
                            onClick={onClose}
                            className="flex items-center gap-3 rounded-lg px-4 py-3 font-medium text-gray-700 hover:bg-orange-50 hover:text-orange-500"
                        >
                            <Home className="h-5 w-5" />
                            Início
                        </Link>
                    </nav>

                    {/* Categories */}
                    <div className="px-4 py-2">
                        <h3 className="mb-2 text-xs font-semibold tracking-wider text-gray-400 uppercase">
                            Categorias
                        </h3>
                        <div className="space-y-1">
                            {categories.map((cat) => (
                                <Link
                                    key={cat.slug}
                                    href={cat.href}
                                    onClick={onClose}
                                    className="block rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                >
                                    {cat.name}
                                </Link>
                            ))}
                        </div>
                    </div>

                    {/* Services */}
                    <div className="mt-4 border-t px-4 py-2">
                        <h3 className="mb-2 text-xs font-semibold tracking-wider text-gray-400 uppercase">
                            Serviços
                        </h3>
                        <div className="space-y-1">
                            {services.map((service) => (
                                <Link
                                    key={service.name}
                                    href={service.href}
                                    onClick={onClose}
                                    className="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                >
                                    <service.icon className="h-4 w-4" />
                                    {service.name}
                                </Link>
                            ))}
                        </div>
                    </div>

                    {/* Account Links */}
                    <div className="mt-4 border-t px-4 py-2">
                        <h3 className="mb-2 text-xs font-semibold tracking-wider text-gray-400 uppercase">
                            Minha Conta
                        </h3>
                        <div className="space-y-1">
                            {auth.user ? (
                                <>
                                    <Link
                                        href="/account"
                                        onClick={onClose}
                                        className="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                    >
                                        <User className="h-4 w-4" />
                                        Minha Conta
                                    </Link>
                                    <Link
                                        href="/account/wishlist"
                                        onClick={onClose}
                                        className="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                    >
                                        <Heart className="h-4 w-4" />
                                        Favoritos
                                    </Link>
                                </>
                            ) : (
                                <>
                                    <Link
                                        href="/login"
                                        onClick={onClose}
                                        className="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                    >
                                        <User className="h-4 w-4" />
                                        Entrar
                                    </Link>
                                    <Link
                                        href="/register"
                                        onClick={onClose}
                                        className="flex items-center gap-3 rounded-lg px-4 py-2.5 text-sm text-gray-600 hover:bg-orange-50 hover:text-orange-500"
                                    >
                                        <User className="h-4 w-4" />
                                        Registar
                                    </Link>
                                </>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
