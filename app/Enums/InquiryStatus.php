<?php

namespace App\Enums;

enum InquiryStatus: string
{
    case Pending = 'pending';
    case Contacted = 'contacted';
    case InProgress = 'in_progress';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}