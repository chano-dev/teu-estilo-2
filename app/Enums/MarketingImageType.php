<?php

namespace App\Enums;

enum MarketingImageType: string
{
    case Banner = 'banner';
    case Background = 'background';
    case Hero = 'hero';
    case Promotional = 'promotional';
    case CategoryCover = 'category_cover';
}
