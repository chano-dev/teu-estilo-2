import { Link } from '@inertiajs/react';
import {
    MapPin,
    Phone,
    Mail,
    Clock,
    Instagram,
    Facebook,
    Youtube,
} from 'lucide-react';

export function StorefrontFooter() {
    return (
        <footer className="mt-auto bg-gray-900 text-gray-300">
            {/* Main Footer */}
            <div className="container mx-auto px-4 py-12">
                <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    {/* Brand & Social */}
                    <div className="lg:col-span-1">
                        <Link href="/" className="mb-4 inline-block">
                            <span className="text-2xl font-bold text-white">
                                TEU
                                <span className="text-orange-500">ESTILO</span>
                            </span>
                        </Link>
                        <p className="mb-6 text-sm text-gray-400">
                            A sua loja de moda feminina em Angola. Encontre as
                            últimas tendências em vestidos, blusas, saias e
                            muito mais.
                        </p>
                        <div className="flex items-center gap-4">
                            <a
                                href="https://instagram.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="rounded-full bg-gray-800 p-2 transition-colors hover:bg-orange-500"
                                aria-label="Instagram"
                            >
                                <Instagram className="h-5 w-5" />
                            </a>
                            <a
                                href="https://facebook.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="rounded-full bg-gray-800 p-2 transition-colors hover:bg-orange-500"
                                aria-label="Facebook"
                            >
                                <Facebook className="h-5 w-5" />
                            </a>
                            <a
                                href="https://youtube.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                className="rounded-full bg-gray-800 p-2 transition-colors hover:bg-orange-500"
                                aria-label="YouTube"
                            >
                                <Youtube className="h-5 w-5" />
                            </a>
                        </div>
                    </div>

                    {/* Quick Links */}
                    <div>
                        <h3 className="mb-4 font-semibold text-white">
                            Comprar
                        </h3>
                        <ul className="space-y-2">
                            <li>
                                <Link
                                    href="/shop"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Todos os Produtos
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/shop?filter[new_arrivals]=1"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Novidades
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/shop?filter[on_sale]=1"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Promoções
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/shop/vestidos"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Vestidos
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/shop/blusas"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Blusas
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* Services */}
                    <div>
                        <h3 className="mb-4 font-semibold text-white">
                            Serviços
                        </h3>
                        <ul className="space-y-2">
                            <li>
                                <Link
                                    href="/servicos/compras-shein"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Compras Shein/AliExpress
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/servicos/perucas"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Aplicação de Perucas
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/servicos/costura"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Costura e Alfaiataria
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/servicos/aluguer"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    Aluguer de Vestidos
                                </Link>
                            </li>
                        </ul>
                    </div>

                    {/* Contact */}
                    <div>
                        <h3 className="mb-4 font-semibold text-white">
                            Contacto
                        </h3>
                        <ul className="space-y-3">
                            <li className="flex items-start gap-3">
                                <MapPin className="mt-0.5 h-5 w-5 shrink-0 text-orange-500" />
                                <span className="text-sm text-gray-400">
                                    Luanda, Angola
                                    <br />
                                    Talatona, Shopping
                                </span>
                            </li>
                            <li className="flex items-center gap-3">
                                <Phone className="h-5 w-5 shrink-0 text-orange-500" />
                                <a
                                    href="tel:+244923456789"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    +244 923 456 789
                                </a>
                            </li>
                            <li className="flex items-center gap-3">
                                <Mail className="h-5 w-5 shrink-0 text-orange-500" />
                                <a
                                    href="mailto:contacto@teuestilo.ao"
                                    className="text-sm text-gray-400 transition-colors hover:text-orange-500"
                                >
                                    contacto@teuestilo.ao
                                </a>
                            </li>
                            <li className="flex items-start gap-3">
                                <Clock className="mt-0.5 h-5 w-5 shrink-0 text-orange-500" />
                                <span className="text-sm text-gray-400">
                                    Seg-Sáb: 9h - 19h
                                    <br />
                                    Domingo: 10h - 17h
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {/* Bottom Bar */}
            <div className="border-t border-gray-800">
                <div className="container mx-auto px-4 py-6">
                    <div className="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <p className="text-sm text-gray-500">
                            © 2026 Teu Estilo. Todos os direitos reservados.
                        </p>
                        <div className="flex items-center gap-6">
                            <Link
                                href="/termos"
                                className="text-sm text-gray-500 hover:text-gray-400"
                            >
                                Termos e Condições
                            </Link>
                            <Link
                                href="/privacidade"
                                className="text-sm text-gray-500 hover:text-gray-400"
                            >
                                Política de Privacidade
                            </Link>
                            <Link
                                href="/entregas"
                                className="text-sm text-gray-500 hover:text-gray-400"
                            >
                                Entregas e Devoluções
                            </Link>
                        </div>
                        <div className="flex items-center gap-2">
                            <span className="text-sm text-gray-500">
                                Métodos de pagamento:
                            </span>
                            <div className="flex gap-2">
                                <div className="flex h-6 w-10 items-center justify-center rounded bg-gray-700 text-xs text-gray-300">
                                    Multicaixa
                                </div>
                                <div className="flex h-6 w-10 items-center justify-center rounded bg-gray-700 text-xs text-gray-300">
                                    Visa
                                </div>
                                <div className="flex h-6 w-10 items-center justify-center rounded bg-gray-700 text-xs text-gray-300">
                                    MP
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    );
}
