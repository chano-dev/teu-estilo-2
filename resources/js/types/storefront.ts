export interface Product {
    id: number;
    sku: string;
    name: string;
    slug: string;
    description: string | null;
    short_description: string | null;
    subcategory_id: number;
    brand_id: number | null;
    collection_id: number | null;
    price_cost: number;
    price_sell: number;
    discount_percentage: number;
    is_active: boolean;
    is_featured: boolean;
    is_new: boolean;
    is_trending: boolean;
    is_bestseller: boolean;
    is_on_sale: boolean;
    views_count: number;
    sales_count: number;
    published_at: string | null;
    created_at: string;
    updated_at: string;
    deleted_at: string | null;
    final_price?: number;
    primary_image?: string;
    images?: ProductImage[];
    variations?: ProductVariation[];
    brand?: Brand | null;
    subcategory?: Subcategory | null;
    colors?: Color[];
    sizes?: Size[];
}

export interface ProductImage {
    id: number;
    product_id: number;
    variation_id: number | null;
    file_path: string;
    file_name: string;
    image_type: string;
    is_primary: boolean;
    sort_order: number;
    alt_text: string | null;
}

export interface ProductVariation {
    id: number;
    product_id: number;
    color_id: number | null;
    size_id: number | null;
    sku_variation: string;
    price_adjustment: number;
    stock_quantity: number;
    stock_reserved: number;
    image_path: string | null;
    is_active: boolean;
    color?: Color | null;
    size?: Size | null;
    final_price?: number;
    stock_available?: number;
}

export interface Category {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    icon: string | null;
    image_path: string | null;
    is_active: boolean;
    sort_order: number;
    subcategories?: Subcategory[];
}

export interface Subcategory {
    id: number;
    category_id: number;
    segment_id: number;
    name: string;
    slug: string;
    description: string | null;
    image_path: string | null;
    sku_code: string;
    is_active: boolean;
    sort_order: number;
    category?: Category;
    products_count?: number;
}

export interface Brand {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    logo_path: string | null;
    banner_path: string | null;
    country_origin: string | null;
    website: string | null;
    is_active: boolean;
    is_featured: boolean;
    sort_order: number;
}

export interface Collection {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    image_path: string | null;
    year: number | null;
    season: string | null;
    starts_at: string | null;
    ends_at: string | null;
    is_active: boolean;
    is_featured: boolean;
    sort_order: number;
}

export interface Color {
    id: number;
    name: string;
    slug: string;
    hex_code: string;
    is_active: boolean;
    sort_order: number;
}

export interface Size {
    id: number;
    name: string;
    slug: string;
    size_type: string;
    description: string | null;
    is_active: boolean;
    sort_order: number;
}

export interface MarketingImage {
    id: number;
    name: string;
    file_path: string;
    image_type: string;
    segment_id: number | null;
    category_id: number | null;
    page: string | null;
    title: string | null;
    subtitle: string | null;
    cta_text: string | null;
    cta_link: string | null;
    start_date: string | null;
    end_date: string | null;
    is_active: boolean;
    sort_order: number;
}

export interface CartItem {
    id: number;
    cart_id: number;
    product_id: number;
    variation_id: number | null;
    quantity: number;
    unit_price: number;
    subtotal: number;
    product?: Product;
    variation?: ProductVariation | null;
}

export interface Cart {
    id: number;
    user_id: number | null;
    session_id: string | null;
    cart_token: string;
    guest_name: string | null;
    guest_email: string | null;
    guest_phone: string | null;
    subtotal: number;
    discount_amount: number;
    delivery_fee: number;
    total: number;
    status: string;
    items?: CartItem[];
}

export interface WishlistItem {
    id: number;
    user_id: number;
    product_id: number;
    variation_id: number | null;
    notify_on_sale: boolean;
    notify_on_restock: boolean;
    created_at: string;
    product?: Product;
    variation?: ProductVariation | null;
}

export interface FilterState {
    colors?: number[];
    sizes?: number[];
    price_min?: number;
    price_max?: number;
    materials?: number[];
    occasions?: number[];
    styles?: number[];
    patterns?: number[];
    fits?: number[];
    lengths?: number[];
    necklines?: number[];
    sleeves?: number[];
    body_types?: number[];
    brands?: number[];
    on_sale?: boolean;
    new_arrivals?: boolean;
}

export interface SortOption {
    value: string;
    label: string;
}

export interface PageProps {
    auth: {
        user: import('./auth').User | null;
    };
    [key: string]: unknown;
}
