<?php

namespace App\Enums;
enum RecommendationLevel: string 
{
    case HighlyRecommended = 'HighlyRecommended';
    case Recommended = 'Recommended';
    case Suitable = 'Suitable';
}