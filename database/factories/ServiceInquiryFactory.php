<?php

namespace Database\Factories;

use App\Enums\InquiryStatus;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceInquiry>
 */
class ServiceInquiryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'user_id' => null,
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->optional()->email(),
            'message' => fake()->paragraph(),
            'image_path' => null,
            'image_path_2' => null,
            'budget' => fake()->optional()->randomFloat(2, 5000, 100000),
            'shein_links' => null,
            'shein_total_usd' => null,
            'estimated_total_aoa' => null,
            'status' => InquiryStatus::Pending,
            'admin_notes' => null,
            'whatsapp_sent' => false,
            'contacted_at' => null,
            'completed_at' => null,
        ];
    }
}