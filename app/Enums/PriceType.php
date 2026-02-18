<?php

namespace App\Enums;

enum PriceType: string
{
    case Fixed = 'fixed';
    case Variable = 'variable';
    case PerHour = 'per_hour';
    case PerDay = 'per_day';
    case Custom = 'custom';
}
