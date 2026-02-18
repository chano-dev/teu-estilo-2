<?php

namespace Database\Seeders;

use App\Models\BodyType;
use App\Models\CareInstruction;
use App\Models\Closure as ClosureModel;
use App\Models\Color;
use App\Models\Fit;
use App\Models\Length;
use App\Models\Material;
use App\Models\Neckline;
use App\Models\Occasion;
use App\Models\Pattern;
use App\Models\Product;
use App\Models\Size;
use App\Models\Sleeve;
use App\Models\Style;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    public function run(): void
    {
        // ===================================================
        // Product 1: Vestido Floral Midi Vermelho
        // ===================================================
        $p1 = Product::where('sku', 'DRESS-TEST-0001')->first();
        if ($p1) {
            $p1->colors()->syncWithoutDetaching(
                Color::whereIn('slug', ['vermelho', 'rosa', 'rosa-escuro'])->pluck('id')
            );
            $p1->sizes()->syncWithoutDetaching(
                Size::whereIn('name', ['S', 'M', 'L'])->where('size_type', 'clothing')->pluck('id')
            );
            $p1->materials()->syncWithoutDetaching([
                Material::where('slug', 'algodao')->value('id') => ['percentage' => 60],
                Material::where('slug', 'poliester')->value('id') => ['percentage' => 40],
            ]);
            $p1->occasions()->syncWithoutDetaching(
                Occasion::whereIn('slug', ['festa', 'romance'])->pluck('id')
            );
            $p1->styles()->syncWithoutDetaching(
                Style::whereIn('slug', ['elegante', 'boemio'])->pluck('id')
            );
            $p1->patterns()->syncWithoutDetaching(
                Pattern::whereIn('slug', ['floral'])->pluck('id')
            );
            $p1->fits()->syncWithoutDetaching(
                Fit::whereIn('slug', ['regular'])->pluck('id')
            );
            $p1->lengths()->syncWithoutDetaching(
                Length::whereIn('slug', ['medio'])->pluck('id')
            );
            $p1->necklines()->syncWithoutDetaching(
                Neckline::whereIn('slug', ['gola-v'])->pluck('id')
            );
            $p1->sleeves()->syncWithoutDetaching(
                Sleeve::whereIn('slug', ['manga-curta'])->pluck('id')
            );
            $p1->closures()->syncWithoutDetaching(
                ClosureModel::whereIn('slug', ['ziper'])->pluck('id')
            );
            $p1->bodyTypes()->syncWithoutDetaching([
                BodyType::where('slug', 'ampulheta')->value('id') => ['recommendation_level' => 'highly_recommended'],
                BodyType::where('slug', 'triangulo')->value('id') => ['recommendation_level' => 'recommended'],
                BodyType::where('slug', 'retangulo')->value('id') => ['recommendation_level' => 'suitable'],
            ]);
            $p1->careInstructions()->syncWithoutDetaching(
                CareInstruction::whereIn('slug', ['maquina-30c', 'secar-ao-ar', 'passar-baixa-temp'])->pluck('id')
            );
        }

        // ===================================================
        // Product 2: Vestido Preto Elegante Longo
        // ===================================================
        $p2 = Product::where('sku', 'DRESS-TEST-0002')->first();
        if ($p2) {
            $p2->colors()->syncWithoutDetaching(
                Color::whereIn('slug', ['preto'])->pluck('id')
            );
            $p2->sizes()->syncWithoutDetaching(
                Size::whereIn('name', ['S', 'M', 'L', 'XL'])->where('size_type', 'clothing')->pluck('id')
            );
            $p2->materials()->syncWithoutDetaching([
                Material::where('slug', 'cetim')->value('id') => ['percentage' => 100],
            ]);
            $p2->occasions()->syncWithoutDetaching(
                Occasion::whereIn('slug', ['festa', 'formal', 'casamento'])->pluck('id')
            );
            $p2->styles()->syncWithoutDetaching(
                Style::whereIn('slug', ['elegante', 'glamour'])->pluck('id')
            );
            $p2->patterns()->syncWithoutDetaching(
                Pattern::whereIn('slug', ['liso'])->pluck('id')
            );
            $p2->fits()->syncWithoutDetaching(
                Fit::whereIn('slug', ['slim'])->pluck('id')
            );
            $p2->lengths()->syncWithoutDetaching(
                Length::whereIn('slug', ['longo'])->pluck('id')
            );
            $p2->necklines()->syncWithoutDetaching(
                Neckline::whereIn('slug', ['gola-v'])->pluck('id')
            );
            $p2->sleeves()->syncWithoutDetaching(
                Sleeve::whereIn('slug', ['sem-manga'])->pluck('id')
            );
            $p2->closures()->syncWithoutDetaching(
                ClosureModel::whereIn('slug', ['ziper'])->pluck('id')
            );
            $p2->bodyTypes()->syncWithoutDetaching([
                BodyType::where('slug', 'ampulheta')->value('id') => ['recommendation_level' => 'highly_recommended'],
                BodyType::where('slug', 'triangulo-invertido')->value('id') => ['recommendation_level' => 'recommended'],
            ]);
            $p2->careInstructions()->syncWithoutDetaching(
                CareInstruction::whereIn('slug', ['lavar-a-mao', 'secar-ao-ar', 'nao-passar'])->pluck('id')
            );
        }

        // ===================================================
        // Product 3: Blusa Branca Cropped
        // ===================================================
        $p3 = Product::where('sku', 'BLOUS-TEST-0001')->first();
        if ($p3) {
            $p3->colors()->syncWithoutDetaching(
                Color::whereIn('slug', ['branco'])->pluck('id')
            );
            $p3->sizes()->syncWithoutDetaching(
                Size::whereIn('name', ['S', 'M', 'L'])->where('size_type', 'clothing')->pluck('id')
            );
            $p3->materials()->syncWithoutDetaching([
                Material::where('slug', 'algodao')->value('id') => ['percentage' => 100],
            ]);
            $p3->occasions()->syncWithoutDetaching(
                Occasion::whereIn('slug', ['dia-a-dia', 'praia'])->pluck('id')
            );
            $p3->styles()->syncWithoutDetaching(
                Style::whereIn('slug', ['casual', 'minimalista'])->pluck('id')
            );
            $p3->patterns()->syncWithoutDetaching(
                Pattern::whereIn('slug', ['liso'])->pluck('id')
            );
            $p3->fits()->syncWithoutDetaching(
                Fit::whereIn('slug', ['regular'])->pluck('id')
            );
            $p3->lengths()->syncWithoutDetaching(
                Length::whereIn('slug', ['cropped'])->pluck('id')
            );
            $p3->necklines()->syncWithoutDetaching(
                Neckline::whereIn('slug', ['gola-redonda'])->pluck('id')
            );
            $p3->sleeves()->syncWithoutDetaching(
                Sleeve::whereIn('slug', ['manga-curta'])->pluck('id')
            );
            $p3->bodyTypes()->syncWithoutDetaching([
                BodyType::where('slug', 'retangulo')->value('id') => ['recommendation_level' => 'highly_recommended'],
                BodyType::where('slug', 'triangulo-invertido')->value('id') => ['recommendation_level' => 'recommended'],
                BodyType::where('slug', 'ampulheta')->value('id') => ['recommendation_level' => 'suitable'],
            ]);
            $p3->careInstructions()->syncWithoutDetaching(
                CareInstruction::whereIn('slug', ['maquina-30c', 'secar-ao-ar'])->pluck('id')
            );
        }

        // ===================================================
        // Product 4: Blazer Oversized Bege
        // ===================================================
        $p4 = Product::where('sku', 'BLAZR-TEST-0001')->first();
        if ($p4) {
            $p4->colors()->syncWithoutDetaching(
                Color::whereIn('slug', ['bege'])->pluck('id')
            );
            $p4->sizes()->syncWithoutDetaching(
                Size::whereIn('name', ['M', 'L'])->where('size_type', 'clothing')->pluck('id')
            );
            $p4->materials()->syncWithoutDetaching([
                Material::where('slug', 'poliester')->value('id') => ['percentage' => 70],
                Material::where('slug', 'viscose')->value('id') => ['percentage' => 30],
            ]);
            $p4->occasions()->syncWithoutDetaching(
                Occasion::whereIn('slug', ['trabalho', 'dia-a-dia'])->pluck('id')
            );
            $p4->styles()->syncWithoutDetaching(
                Style::whereIn('slug', ['classico', 'minimalista'])->pluck('id')
            );
            $p4->patterns()->syncWithoutDetaching(
                Pattern::whereIn('slug', ['liso'])->pluck('id')
            );
            $p4->fits()->syncWithoutDetaching(
                Fit::whereIn('slug', ['oversized'])->pluck('id')
            );
            $p4->lengths()->syncWithoutDetaching(
                Length::whereIn('slug', ['medio'])->pluck('id')
            );
            $p4->sleeves()->syncWithoutDetaching(
                Sleeve::whereIn('slug', ['manga-longa'])->pluck('id')
            );
            $p4->closures()->syncWithoutDetaching(
                ClosureModel::whereIn('slug', ['botoes'])->pluck('id')
            );
            $p4->bodyTypes()->syncWithoutDetaching([
                BodyType::where('slug', 'retangulo')->value('id') => ['recommendation_level' => 'highly_recommended'],
                BodyType::where('slug', 'oval')->value('id') => ['recommendation_level' => 'recommended'],
            ]);
            $p4->careInstructions()->syncWithoutDetaching(
                CareInstruction::whereIn('slug', ['limpeza-profissional', 'guardar-local-seco'])->pluck('id')
            );
        }

        // ===================================================
        // Product 5: Saia Midi Plissada Preta
        // ===================================================
        $p5 = Product::where('sku', 'SKIRT-TEST-0001')->first();
        if ($p5) {
            $p5->colors()->syncWithoutDetaching(
                Color::whereIn('slug', ['preto'])->pluck('id')
            );
            $p5->sizes()->syncWithoutDetaching(
                Size::whereIn('name', ['S', 'M', 'L'])->where('size_type', 'clothing')->pluck('id')
            );
            $p5->materials()->syncWithoutDetaching([
                Material::where('slug', 'poliester')->value('id') => ['percentage' => 100],
            ]);
            $p5->occasions()->syncWithoutDetaching(
                Occasion::whereIn('slug', ['trabalho', 'igreja', 'formal'])->pluck('id')
            );
            $p5->styles()->syncWithoutDetaching(
                Style::whereIn('slug', ['elegante', 'classico'])->pluck('id')
            );
            $p5->patterns()->syncWithoutDetaching(
                Pattern::whereIn('slug', ['liso'])->pluck('id')
            );
            $p5->fits()->syncWithoutDetaching(
                Fit::whereIn('slug', ['regular'])->pluck('id')
            );
            $p5->lengths()->syncWithoutDetaching(
                Length::whereIn('slug', ['medio'])->pluck('id')
            );
            $p5->closures()->syncWithoutDetaching(
                ClosureModel::whereIn('slug', ['elastico'])->pluck('id')
            );
            $p5->bodyTypes()->syncWithoutDetaching([
                BodyType::where('slug', 'triangulo')->value('id') => ['recommendation_level' => 'highly_recommended'],
                BodyType::where('slug', 'ampulheta')->value('id') => ['recommendation_level' => 'recommended'],
                BodyType::where('slug', 'oval')->value('id') => ['recommendation_level' => 'suitable'],
            ]);
            $p5->careInstructions()->syncWithoutDetaching(
                CareInstruction::whereIn('slug', ['maquina-30c', 'nao-passar'])->pluck('id')
            );
        }
    }
}
