<?php

namespace App\Enums;
enum CartStatus: string
{
    case Active = 'Active';
    case Completed = 'Completed';
    case Abandoned = 'Abandoned';
    case Expired = 'Expired';
    case Converted = 'Converted';
}