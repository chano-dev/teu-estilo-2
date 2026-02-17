<?php

namespace App\Enums;

enum Season: string
{
    case SpringSummer = 'spring_summer';
    case FallWinter = 'fall_winter';
    case AllYear = 'all_year';
    case Special = 'special';
}