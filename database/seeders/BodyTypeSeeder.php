<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Seeder;

class BodyTypeSeeder extends Seeder
{
    public function run(): void
    {
        $bodyTypes = [
            [
                'name' => 'Ampulheta',
                'slug' => 'ampulheta',
                'description' => 'Corpo equilibrado com ombros e ancas da mesma largura e cintura bem definida.',
                'characteristics' => 'Ombros e ancas alinhados. Cintura estreita e bem marcada. Curvas proporcionais. Busto e ancas equilibrados.',
                'tips' => 'Valorize a cintura com cintos e peças ajustadas. Vestidos wrap e pencil skirts são perfeitos. Evite peças muito largas que escondam suas curvas. Decotes em V realçam o busto de forma elegante.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Triângulo (Pêra)',
                'slug' => 'triangulo',
                'description' => 'Ancas mais largas que os ombros, com cintura definida.',
                'characteristics' => 'Ombros estreitos. Ancas e coxas mais largas. Cintura marcada. Busto pequeno a médio.',
                'tips' => 'Destaque a parte superior com decotes, cores claras e detalhes. Use calças e saias de cores escuras. Blusas com volume nos ombros equilibram a silhueta. Evite calças muito justas nas ancas.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Triângulo Invertido',
                'slug' => 'triangulo-invertido',
                'description' => 'Ombros mais largos que as ancas, silhueta atlética.',
                'characteristics' => 'Ombros largos e definidos. Ancas estreitas. Cintura pouco marcada. Pernas geralmente finas.',
                'tips' => 'Equilibre com saias rodadas e calças mais largas em baixo. Evite ombreiras e decotes muito abertos. Cores escuras em cima e claras em baixo. Vestidos evasê e A-line são ideais.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Retângulo',
                'slug' => 'retangulo',
                'description' => 'Ombros, cintura e ancas com medidas similares, silhueta reta.',
                'characteristics' => 'Pouca definição na cintura. Ombros e ancas alinhados. Silhueta alongada e reta. Corpo esguio e atlético.',
                'tips' => 'Crie curvas com peplums, cintos e drapeados. Vestidos com recortes na cintura. Saias e calças de cintura alta. Camadas e texturas adicionam dimensão. Evite peças muito retas e sem forma.',
                'sort_order' => 4,
            ],
            [
                'name' => 'Oval (Maçã)',
                'slug' => 'oval',
                'description' => 'Volume concentrado no centro do corpo, com pernas e braços mais finos.',
                'characteristics' => 'Barriga mais proeminente. Busto geralmente avantajado. Pernas e braços proporcionalmente finos. Pouca definição na cintura.',
                'tips' => 'Valorize pernas e braços com saias na altura do joelho e mangas elegantes. Use decotes em V para alongar. Tecidos fluidos e que não marquem a barriga. Empire line e vestidos trapézio favorecem. Evite cintos na cintura natural.',
                'sort_order' => 5,
            ],
        ];

        foreach ($bodyTypes as $data) {
            BodyType::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, [
                    'image_path' => null,
                    'is_active' => true,
                ]),
            );
        }
    }
}
