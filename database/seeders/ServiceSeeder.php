<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Segment;
use App\Models\Service;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure a subcategory exists for services
        $servicos = Category::where('slug', 'servicos')->first();
        $mulher = Segment::where('slug', 'mulher')->first();

        if (! $servicos || ! $mulher) {
            $this->command->error('Category "Serviços" or Segment "Mulher" not found.');

            return;
        }

        $servicosSub = Subcategory::query()->updateOrCreate(
            ['sku_code' => 'SERVC'],
            [
                'category_id' => $servicos->id,
                'segment_id' => $mulher->id,
                'name' => 'Serviços Gerais',
                'slug' => 'servicos-gerais',
                'description' => 'Serviços premium do Teu Estilo.',
                'is_active' => true,
                'sort_order' => 1,
            ],
        );

        $services = [
            [
                'name' => 'Aluguer de Vestidos',
                'slug' => 'aluguer-de-vestidos',
                'description' => 'Alugue vestidos de gala, festa ou casamento por dias ou fim-de-semana. Variedade de tamanhos e estilos disponíveis. Inclui prova prévia.',
                'short_description' => 'Aluguer de vestidos para eventos especiais.',
                'subcategory_id' => $servicosSub->id,
                'segment_id' => $mulher->id,
                'base_price' => 15000.00,
                'price_type' => 'per_day',
                'requires_measurements' => true,
                'requires_deposit' => true,
                'deposit_percentage' => 50.00,
                'duration_minutes' => null,
                'available_days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'],
                'available_hours' => ['start' => '09:00', 'end' => '18:00'],
                'max_advance_booking_days' => 60,
                'is_featured' => true,
                'sort_order' => 1,
                'meta_title' => 'Aluguer de Vestidos em Luanda | Teu Estilo',
                'meta_description' => 'Alugue vestidos de festa e gala em Luanda. Prova prévia incluída. Preços acessíveis.',
            ],
            [
                'name' => 'Costura e Alfaiataria',
                'slug' => 'costura-e-alfaiataria',
                'description' => 'Serviço de costura personalizada: ajustes, roupa por medida, consertos e transformações. Costureiras profissionais com experiência em moda feminina.',
                'short_description' => 'Ajustes, roupa por medida e consertos.',
                'subcategory_id' => $servicosSub->id,
                'segment_id' => $mulher->id,
                'base_price' => 5000.00,
                'price_type' => 'variable',
                'requires_measurements' => true,
                'requires_deposit' => true,
                'deposit_percentage' => 30.00,
                'duration_minutes' => 60,
                'available_days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'],
                'available_hours' => ['start' => '09:00', 'end' => '17:00'],
                'max_advance_booking_days' => 30,
                'is_featured' => true,
                'sort_order' => 2,
                'meta_title' => 'Costura e Alfaiataria em Luanda | Teu Estilo',
                'meta_description' => 'Serviço de costura e ajustes em Luanda. Roupa por medida, consertos e transformações.',
            ],
            [
                'name' => 'Aplicação de Perucas',
                'slug' => 'aplicacao-de-perucas',
                'description' => 'Aplicação profissional de perucas lace front, full lace e closure. Inclui preparação do cabelo natural, aplicação e estilização final.',
                'short_description' => 'Aplicação profissional de perucas e extensões.',
                'subcategory_id' => $servicosSub->id,
                'segment_id' => $mulher->id,
                'base_price' => 8000.00,
                'price_type' => 'fixed',
                'requires_measurements' => false,
                'requires_deposit' => false,
                'deposit_percentage' => 0,
                'duration_minutes' => 120,
                'available_days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'],
                'available_hours' => ['start' => '09:00', 'end' => '19:00'],
                'max_advance_booking_days' => 14,
                'is_featured' => true,
                'sort_order' => 3,
                'meta_title' => 'Aplicação de Perucas em Luanda | Teu Estilo',
                'meta_description' => 'Aplicação profissional de perucas em Luanda. Lace front, full lace e closure.',
            ],
        ];

        foreach ($services as $data) {
            Service::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
