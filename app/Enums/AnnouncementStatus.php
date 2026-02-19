<?php

namespace App\Enums;

enum AnnouncementStatus: string
{
    case Scheduled = 'scheduled';
    case Open = 'open';
    case Closed = 'closed';
    case Paused = 'paused';
}