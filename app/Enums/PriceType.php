<?php

namespace App\Enums;
enum PriceType: string 
{
    case Fixed = 'Fixed';
    case Variable = 'Variable';
    case Perhour = 'PerHour';
    case Perday = 'PerDay';
    case Custom = 'Custom';
}