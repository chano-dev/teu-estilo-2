<?php

namespace App\Enums;

enum ColorType:string 
{
    case Solid = 'Solid';
    case Pattern = 'Pattern';
    case Gradient = 'Gradient';
    case BlackAndWhite = 'BlackAndWhite';
    case Metallic = 'Metallic';
    case Multicolor = 'Multicolor';
    case Neon = 'Neon';
    case Pastel = 'Pastel';
    case Transparent = 'Transparent';
}