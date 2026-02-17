<?php

namespace Database\Seeders;

use App\Models\CareInstruction;
use Illuminate\Database\Seeder;

class CareInstructionSeeder extends Seeder
{
    public function run(): void
    {
        $instructions = [
            // Washing
            ['name' => 'Lavar à mão', 'slug' => 'lavar-a-mao', 'instruction_type' => 'washing', 'icon' => 'hand-wash', 'description' => 'Recomendado para tecidos delicados e bijuteria.', 'sort_order' => 1],
            ['name' => 'Máquina 30°C', 'slug' => 'maquina-30c', 'instruction_type' => 'washing', 'icon' => 'wash-30', 'description' => 'Lavagem em ciclo suave até 30 graus.', 'sort_order' => 2],
            ['name' => 'Não lavar', 'slug' => 'nao-lavar', 'instruction_type' => 'washing', 'icon' => 'do-not-wash', 'description' => 'Limpeza apenas a seco ou específica.', 'sort_order' => 3],

            // Drying
            ['name' => 'Secar ao ar', 'slug' => 'secar-ao-ar', 'instruction_type' => 'drying', 'icon' => 'air-dry', 'description' => 'Evitar máquina de secar.', 'sort_order' => 4],
            ['name' => 'Não usar secadora', 'slug' => 'nao-usar-secadora', 'instruction_type' => 'drying', 'icon' => 'no-tumble-dry', 'description' => 'Pode danificar fibras ou acabamentos.', 'sort_order' => 5],

            // Ironing
            ['name' => 'Passar baixa temperatura', 'slug' => 'passar-baixa-temp', 'instruction_type' => 'ironing', 'icon' => 'iron-low', 'description' => 'Até 110 graus.', 'sort_order' => 6],
            ['name' => 'Não passar', 'slug' => 'nao-passar', 'instruction_type' => 'ironing', 'icon' => 'do-not-iron', 'description' => 'Pode danificar o produto.', 'sort_order' => 7],

            // Storage
            ['name' => 'Guardar em local seco', 'slug' => 'guardar-local-seco', 'instruction_type' => 'storage', 'icon' => 'store-dry', 'description' => 'Evitar humidade e calor.', 'sort_order' => 8],
            ['name' => 'Evitar sol direto', 'slug' => 'evitar-sol-direto', 'instruction_type' => 'storage', 'icon' => 'no-sun', 'description' => 'Previne desbotamento e degradação.', 'sort_order' => 9],

            // Usage
            ['name' => 'Evitar contato com água', 'slug' => 'evitar-agua', 'instruction_type' => 'usage', 'icon' => 'no-water', 'description' => 'Especialmente para bijuteria e cosméticos.', 'sort_order' => 10],
            ['name' => 'Uso externo', 'slug' => 'uso-externo', 'instruction_type' => 'usage', 'icon' => 'external-use', 'description' => 'Não ingerir ou aplicar internamente.', 'sort_order' => 11],

            // Expiry
            ['name' => 'Validade após abertura', 'slug' => 'validade-apos-abertura', 'instruction_type' => 'expiry', 'icon' => 'expiry', 'description' => 'Cosméticos devem ser usados dentro do prazo.', 'sort_order' => 12],

            // Other
            ['name' => 'Limpeza profissional', 'slug' => 'limpeza-profissional', 'instruction_type' => 'other', 'icon' => 'dry-clean', 'description' => 'Recomendado para itens sensíveis.', 'sort_order' => 13],
        ];

        foreach ($instructions as $data) {
            CareInstruction::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
