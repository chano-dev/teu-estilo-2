<?php

namespace App\Enums;

enum ProductCondition: string
{
    case New = 'new';
    case Used = 'used';
    case SemiNew = 'semi_new';
}
