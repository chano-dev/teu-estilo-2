<?php

namespace Database\Factories;

use App\Enums\AnnouncementStatus;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceAnnouncement>
 */
class ServiceAnnouncementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'title' => fake()->sentence(4),
            'message' => fake()->paragraph(),
            'status' => AnnouncementStatus::Scheduled,
            'opens_at' => now()->addDays(7),
            'closes_at' => now()->addDays(14),
            'next_opening_at' => null,
            'internal_limit' => 250000.00,
            'internal_used' => 0,
            'internal_notes' => null,
            'show_countdown' => true,
            'is_active' => true,
        ];
    }
}