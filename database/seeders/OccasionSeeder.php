<?php

namespace Database\Seeders;

use App\Models\Occasion;
use Illuminate\Database\Seeder;

class OccasionSeeder extends Seeder
{
    public function run(): void
    {
        $occasions = [
            ['name' => 'Dia a Dia', 'slug' => 'dia-a-dia', 'description' => 'Peças e produtos para uso cotidiano, confortáveis e práticos.', 'icon' => 'fas fa-home', 'sort_order' => 1],
            ['name' => 'Trabalho', 'slug' => 'trabalho', 'description' => 'Looks profissionais, formais ou business casual para o ambiente corporativo.', 'icon' => 'fas fa-briefcase', 'sort_order' => 2],
            ['name' => 'Festa', 'slug' => 'festa', 'description' => 'Itens para celebrações noturnas, festas e eventos festivos.', 'icon' => 'fas fa-glass-whiskey', 'sort_order' => 3],
            ['name' => 'Casamento', 'slug' => 'casamento', 'description' => 'Roupas, acessórios e cosméticos para núpcias — convidados ou noivos.', 'icon' => 'fas fa-ring', 'sort_order' => 4],
            ['name' => 'Igreja', 'slug' => 'igreja', 'description' => 'Looks modestos e elegantes para cultos e cerimónias religiosas.', 'icon' => 'fas fa-church', 'sort_order' => 5],
            ['name' => 'Praia', 'slug' => 'praia', 'description' => 'Moda praiana: biquínis, roupas leves, chapéus, protetor solar, etc.', 'icon' => 'fas fa-umbrella-beach', 'sort_order' => 6],
            ['name' => 'Esporte', 'slug' => 'esporte', 'description' => 'Vestuário e acessórios para atividade física e lazer ativo.', 'icon' => 'fas fa-running', 'sort_order' => 7],
            ['name' => 'Romance', 'slug' => 'romance', 'description' => 'Peças sedutoras ou elegantes para encontros especiais.', 'icon' => 'fas fa-heart', 'sort_order' => 8],
            ['name' => 'Viagem', 'slug' => 'viagem', 'description' => 'Itens práticos e versáteis para usar em deslocamentos e turismo.', 'icon' => 'fas fa-suitcase', 'sort_order' => 9],
            ['name' => 'Formal', 'slug' => 'formal', 'description' => 'Looks elegantes para cerimónias, coquetéis e eventos solenes.', 'icon' => 'fas fa-vest', 'sort_order' => 10],
        ];

        foreach ($occasions as $data) {
            Occasion::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}