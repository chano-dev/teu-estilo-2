<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    public function run(): void
    {
        $collections = [
            // EVENTOS ESPECIAIS 2026
            ['name' => 'Dia dos Namorados 2026', 'slug' => 'dia-namorados-2026', 'description' => 'Coleção romântica para o Dia dos Namorados.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-01-20', 'ends_at' => '2026-02-15', 'is_active' => true, 'is_featured' => true, 'sort_order' => 1, 'meta_title' => 'Dia dos Namorados 2026 Angola | Teu Estilo', 'meta_description' => 'Peças românticas para o Dia dos Namorados.'],
            ['name' => 'Dia da Mulher 2026', 'slug' => 'dia-mulher-2026', 'description' => 'Coleção especial para o Dia Internacional da Mulher.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-02-20', 'ends_at' => '2026-03-10', 'is_active' => false, 'is_featured' => true, 'sort_order' => 2, 'meta_title' => 'Dia da Mulher 2026 Angola | Teu Estilo', 'meta_description' => 'Celebre o Dia da Mulher com estilo.'],
            ['name' => 'Dia das Mães 2026', 'slug' => 'dia-maes-2026', 'description' => 'Coleção para celebrar as mães angolanas.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-04-20', 'ends_at' => '2026-05-15', 'is_active' => false, 'is_featured' => false, 'sort_order' => 3, 'meta_title' => 'Dia das Mães 2026 Angola | Teu Estilo', 'meta_description' => 'Presentes especiais para o Dia das Mães.'],
            ['name' => 'Halloween 2026', 'slug' => 'halloween-2026', 'description' => 'Coleção Halloween com peças góticas e criativas.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-10-01', 'ends_at' => '2026-11-01', 'is_active' => false, 'is_featured' => false, 'sort_order' => 4, 'meta_title' => 'Halloween 2026 Angola | Teu Estilo', 'meta_description' => 'Looks para festas de Halloween.'],
            ['name' => 'Natal 2026', 'slug' => 'natal-2026', 'description' => 'Coleção de Natal com vestidos festivos e elegantes.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-11-15', 'ends_at' => '2026-12-26', 'is_active' => false, 'is_featured' => true, 'sort_order' => 5, 'meta_title' => 'Natal 2026 Angola - Vestidos Festivos | Teu Estilo', 'meta_description' => 'Roupas de Natal em Luanda.'],
            ['name' => 'Réveillon 2026', 'slug' => 'reveillon-2026', 'description' => 'Coleção exclusiva para a passagem de ano em Angola.', 'year' => 2026, 'season' => 'special', 'starts_at' => '2026-12-05', 'ends_at' => '2027-01-05', 'is_active' => false, 'is_featured' => true, 'sort_order' => 6, 'meta_title' => 'Réveillon 2026 Angola - Vestidos de Festa | Teu Estilo', 'meta_description' => 'Looks deslumbrantes para a virada do ano.'],

            // SAZONAIS
            ['name' => 'Verão 2026', 'slug' => 'verao-2026', 'description' => 'Coleção de verão com peças leves e coloridas.', 'year' => 2026, 'season' => 'spring_summer', 'starts_at' => '2025-12-01', 'ends_at' => '2026-04-30', 'is_active' => true, 'is_featured' => true, 'sort_order' => 7, 'meta_title' => 'Verão 2026 Angola - Moda Leve | Teu Estilo', 'meta_description' => 'Moda de verão em Luanda.'],
            ['name' => 'Inverno Leve 2026', 'slug' => 'inverno-2026', 'description' => 'Coleção para noites frescas de Angola.', 'year' => 2026, 'season' => 'fall_winter', 'starts_at' => '2026-05-01', 'ends_at' => '2026-08-31', 'is_active' => false, 'is_featured' => false, 'sort_order' => 8, 'meta_title' => 'Inverno Leve 2026 Angola | Teu Estilo', 'meta_description' => 'Roupas para noites frescas.'],
            ['name' => 'Primavera 2026', 'slug' => 'primavera-2026', 'description' => 'Coleção de primavera com cores vibrantes.', 'year' => 2026, 'season' => 'spring_summer', 'starts_at' => '2026-09-01', 'ends_at' => '2026-11-30', 'is_active' => false, 'is_featured' => false, 'sort_order' => 9, 'meta_title' => 'Primavera 2026 Angola | Teu Estilo', 'meta_description' => 'Moda de primavera em Luanda.'],

            // TEMÁTICAS (anuais — sem data de fim fixa)
            ['name' => 'Back to Work', 'slug' => 'back-to-work', 'description' => 'Coleção profissional para o trabalho.', 'year' => 2026, 'season' => 'all_year', 'starts_at' => '2026-01-01', 'ends_at' => '2026-12-31', 'is_active' => true, 'is_featured' => false, 'sort_order' => 10, 'meta_title' => 'Moda Trabalho Angola | Teu Estilo', 'meta_description' => 'Roupas profissionais em Luanda.'],
            ['name' => 'Back to School', 'slug' => 'back-to-school', 'description' => 'Coleção para estudantes.', 'year' => 2026, 'season' => 'all_year', 'starts_at' => '2026-01-01', 'ends_at' => '2026-12-31', 'is_active' => true, 'is_featured' => false, 'sort_order' => 11, 'meta_title' => 'Moda Escola Angola | Teu Estilo', 'meta_description' => 'Roupas para escola e universidade.'],
            ['name' => 'Férias na Praia', 'slug' => 'ferias-praia', 'description' => 'Coleção para as férias na praia.', 'year' => 2026, 'season' => 'spring_summer', 'starts_at' => '2025-12-01', 'ends_at' => '2026-03-31', 'is_active' => true, 'is_featured' => true, 'sort_order' => 12, 'meta_title' => 'Férias Praia Angola | Teu Estilo', 'meta_description' => 'Moda praia em Angola.'],
            ['name' => 'Noite Glamorosa', 'slug' => 'noite-glamorosa', 'description' => 'Coleção para eventos noturnos.', 'year' => 2026, 'season' => 'all_year', 'starts_at' => '2026-01-01', 'ends_at' => '2026-12-31', 'is_active' => true, 'is_featured' => false, 'sort_order' => 13, 'meta_title' => 'Looks Noite Angola | Teu Estilo', 'meta_description' => 'Looks glamorosos para festas.'],
            ['name' => 'Convidada Especial', 'slug' => 'convidada-casamento', 'description' => 'Coleção para convidadas de casamento.', 'year' => 2026, 'season' => 'all_year', 'starts_at' => '2026-01-01', 'ends_at' => '2026-12-31', 'is_active' => true, 'is_featured' => false, 'sort_order' => 14, 'meta_title' => 'Looks Casamento Angola | Teu Estilo', 'meta_description' => 'Vestidos para convidadas de casamento.'],
            ['name' => 'Maternidade Chic', 'slug' => 'maternidade-chic', 'description' => 'Coleção para grávidas.', 'year' => 2026, 'season' => 'all_year', 'starts_at' => '2026-01-01', 'ends_at' => '2026-12-31', 'is_active' => false, 'is_featured' => false, 'sort_order' => 15, 'meta_title' => 'Moda Gestante Angola | Teu Estilo', 'meta_description' => 'Roupas para grávidas em Luanda.'],
        ];

        foreach ($collections as $collection) {
            Collection::query()->updateOrCreate(
                ['slug' => $collection['slug']],
                $collection,
            );
        }
    }
}