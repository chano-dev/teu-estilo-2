import { ReactNode, useState } from 'react';
import { Head } from '@inertiajs/react';
import { StorefrontHeader } from '@/components/storefront/header';
import { StorefrontFooter } from '@/components/storefront/footer';
import { StorefrontMobileNav } from '@/components/storefront/mobile-nav';

interface StorefrontLayoutProps {
    children: ReactNode;
    title?: string;
    description?: string;
}

export default function StorefrontLayout({
    children,
    title = 'Teu Estilo - Moda Feminina em Angola',
    description = 'Descubra as últimas tendências de moda feminina em Angola. Vestidos, blusas, saias e muito mais.',
}: StorefrontLayoutProps) {
    const [mobileNavOpen, setMobileNavOpen] = useState(false);

    return (
        <>
            <Head>
                <title>{title}</title>
                <meta name="description" content={description} />
                <meta
                    name="viewport"
                    content="width=device-width, initial-scale=1"
                />
                <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
            </Head>

            <div className="flex min-h-screen flex-col bg-white">
                <StorefrontHeader onMenuClick={() => setMobileNavOpen(true)} />

                <main className="flex-1">{children}</main>

                <StorefrontFooter />
                <StorefrontMobileNav
                    isOpen={mobileNavOpen}
                    onClose={() => setMobileNavOpen(false)}
                />
            </div>
        </>
    );
}
