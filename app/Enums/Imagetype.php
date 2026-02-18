<?php

namespace App\Enums;
enum ImageType: string
{
    case Main = 'main';
    case Front = 'front';
    case Back = 'back';
    case Side = 'side';
    case Detail = 'detail';
    case Model = 'model';
    case Flat = 'flat';
    case Lifestyle = 'lifestyle';

}