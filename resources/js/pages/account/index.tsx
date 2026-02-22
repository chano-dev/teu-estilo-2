import { Link, usePage } from '@inertiajs/react';
import { User, Heart, Package, MapPin, Settings, LogOut } from 'lucide-react';
import StorefrontLayout from '@/layouts/storefront-layout';
import type { PageProps } from '@/types';

export default function AccountIndex() {
    const { auth } = usePage<PageProps>().props;
    const user = auth.user;

    const menuItems = [
        { icon: User, label: 'Minha Conta', href: '/account' },
        { icon: Package, label: 'Meus Pedidos', href: '/account/orders' },
        { icon: Heart, label: 'Favoritos', href: '/account/wishlist' },
        { icon: MapPin, label: 'Moradas', href: '/account/addresses' },
        { icon: Settings, label: 'Configurações', href: '/settings/profile' },
    ];

    return (
        <StorefrontLayout title="Minha Conta | Teu Estilo">
            <div className="container mx-auto px-4 py-8">
                <h1 className="mb-8 text-2xl font-bold text-gray-900">
                    Minha Conta
                </h1>

                <div className="grid grid-cols-1 gap-8 lg:grid-cols-4">
                    {/* Sidebar */}
                    <div className="lg:col-span-1">
                        {/* User Info */}
                        <div className="mb-6 rounded-xl bg-gray-50 p-6">
                            <div className="flex items-center gap-4">
                                <div className="flex h-16 w-16 items-center justify-center rounded-full bg-orange-100">
                                    <User className="h-8 w-8 text-orange-500" />
                                </div>
                                <div>
                                    <p className="font-semibold text-gray-900">
                                        {user?.name}
                                    </p>
                                    <p className="text-sm text-gray-500">
                                        {user?.email}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {/* Menu */}
                        <nav className="space-y-1">
                            {menuItems.map((item) => (
                                <Link
                                    key={item.href}
                                    href={item.href}
                                    className="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-700 transition-colors hover:bg-orange-50 hover:text-orange-600"
                                >
                                    <item.icon className="h-5 w-5" />
                                    {item.label}
                                </Link>
                            ))}
                            <Link
                                href="/logout"
                                method="post"
                                as="button"
                                className="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-red-600 transition-colors hover:bg-red-50"
                            >
                                <LogOut className="h-5 w-5" />
                                Terminar Sessão
                            </Link>
                        </nav>
                    </div>

                    {/* Content */}
                    <div className="lg:col-span-3">
                        {/* Welcome Message */}
                        <div className="mb-8 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 p-8 text-white">
                            <h2 className="mb-2 text-2xl font-bold">
                                Bem-vinda, {user?.name?.split(' ')[0]}!
                            </h2>
                            <p className="opacity-90">
                                Gerencie os seus pedidos, favoritos e
                                informações pessoais.
                            </p>
                        </div>

                        {/* Quick Actions */}
                        <div className="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <Link
                                href="/account/orders"
                                className="rounded-xl border border-gray-200 bg-white p-6 transition-all hover:border-orange-500 hover:shadow-md"
                            >
                                <Package className="mb-3 h-8 w-8 text-orange-500" />
                                <h3 className="font-semibold text-gray-900">
                                    Meus Pedidos
                                </h3>
                                <p className="mt-1 text-sm text-gray-500">
                                    Acompanhe as suas compras
                                </p>
                            </Link>

                            <Link
                                href="/account/wishlist"
                                className="rounded-xl border border-gray-200 bg-white p-6 transition-all hover:border-orange-500 hover:shadow-md"
                            >
                                <Heart className="mb-3 h-8 w-8 text-orange-500" />
                                <h3 className="font-semibold text-gray-900">
                                    Favoritos
                                </h3>
                                <p className="mt-1 text-sm text-gray-500">
                                    Os seus produtos favoritos
                                </p>
                            </Link>

                            <Link
                                href="/account/addresses"
                                className="rounded-xl border border-gray-200 bg-white p-6 transition-all hover:border-orange-500 hover:shadow-md"
                            >
                                <MapPin className="mb-3 h-8 w-8 text-orange-500" />
                                <h3 className="font-semibold text-gray-900">
                                    Moradas
                                </h3>
                                <p className="mt-1 text-sm text-gray-500">
                                    Gerencie as suas moradas
                                </p>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </StorefrontLayout>
    );
}
