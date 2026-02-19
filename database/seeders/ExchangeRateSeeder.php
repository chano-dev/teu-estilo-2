<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    public function run(): void
    {
        $rates = [
            [
                'currency_from' => 'USD',
                'currency_to' => 'AOA',
                'rate' => 920.0000,
                'margin_percentage' => 8.00,
                'is_active' => true,
                'effective_from' => now(),
            ],
            [
                'currency_from' => 'EUR',
                'currency_to' => 'AOA',
                'rate' => 985.0000,
                'margin_percentage' => 8.00,
                'is_active' => true,
                'effective_from' => now(),
            ],
        ];

        foreach ($rates as $data) {
            ExchangeRate::query()->updateOrCreate(
                ['currency_from' => $data['currency_from'], 'currency_to' => $data['currency_to']],
                $data,
            );
        }
    }
}