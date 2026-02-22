import { Link } from '@inertiajs/react';
import { cn } from '@/lib/utils';

interface CategoryCardProps {
    category: {
        id: number;
        name: string;
        slug: string;
        image_path: string | null;
        products_count?: number;
    };
    className?: string;
}

export function CategoryCard({ category, className }: CategoryCardProps) {
    const imageUrl =
        category.image_path ||
        `https://images.unsplash.com/photo-1483985988355-763728e1935b?w=400&h=400&fit=crop`;
    const productCount = category.products_count || 0;

    return (
        <Link
            href={`/shop/${category.slug}`}
            className={cn('group block', className)}
        >
            <div className="relative mb-3 aspect-square overflow-hidden rounded-xl bg-gray-100">
                <img
                    src={imageUrl}
                    alt={category.name}
                    className="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100" />
            </div>

            <div className="text-center">
                <h3 className="font-semibold text-gray-900 transition-colors group-hover:text-orange-500">
                    {category.name}
                </h3>
                {productCount > 0 && (
                    <p className="mt-0.5 text-sm text-gray-500">
                        {productCount} produtos
                    </p>
                )}
            </div>
        </Link>
    );
}
