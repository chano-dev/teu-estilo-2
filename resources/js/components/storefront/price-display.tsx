import { cn } from '@/lib/utils';

interface PriceDisplayProps {
    price: number;
    discountPercentage?: number;
    size?: 'sm' | 'md' | 'lg';
    className?: string;
}

export function PriceDisplay({
    price,
    discountPercentage = 0,
    size = 'md',
    className,
}: PriceDisplayProps) {
    const finalPrice =
        discountPercentage > 0 ? price * (1 - discountPercentage / 100) : price;

    const sizeClasses = {
        sm: 'text-sm',
        md: 'text-base',
        lg: 'text-xl',
    };

    return (
        <div className={cn('flex items-center gap-2', className)}>
            <span
                className={cn(
                    'font-bold',
                    sizeClasses[size],
                    discountPercentage > 0 ? 'text-red-500' : 'text-gray-900',
                )}
            >
                {finalPrice.toLocaleString('pt-AO', {
                    style: 'currency',
                    currency: 'AOA',
                })}
            </span>

            {discountPercentage > 0 && (
                <>
                    <span
                        className={cn(
                            'text-gray-400 line-through',
                            sizeClasses[size],
                        )}
                    >
                        {price.toLocaleString('pt-AO', {
                            style: 'currency',
                            currency: 'AOA',
                        })}
                    </span>
                    <span className="rounded bg-red-500 px-1.5 py-0.5 text-xs font-medium text-white">
                        -{discountPercentage}%
                    </span>
                </>
            )}
        </div>
    );
}
