<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            ['name' => 'Eco Fashion (Outlet & Fardo)', 'company_name' => 'Ckeuta-Vendas', 'slug' => 'ckeuta-vendas', 'sku_code' => 'CKEU', 'phone' => '929839776', 'whatsapp' => '929839776', 'address' => 'Samba - Antigo Control', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Esmeralda Basquete', 'company_name' => 'Tchiva\'s Shop', 'slug' => 'tchivas-shop', 'sku_code' => 'TCHI', 'phone' => '931251840', 'whatsapp' => '931251840', 'address' => 'Futungo; Morro Bento', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Tendência MBM', 'company_name' => 'Tendência MBM', 'slug' => 'tendencia-mbm', 'sku_code' => 'TEND', 'phone' => '925792097', 'whatsapp' => '925792097', 'address' => 'Morro Bento - Antes da paragem da Imetro', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Rebeca Luísa', 'company_name' => 'Rebeca Luísa', 'slug' => 'rebeca-luisa', 'sku_code' => 'REBE', 'phone' => '931896810', 'whatsapp' => '927098724', 'address' => 'Maculusso - Rua Rei Katyavala', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Sú Pedro', 'company_name' => 'Sú Pedro', 'slug' => 'su-pedro', 'sku_code' => 'SUPE', 'phone' => '931584005', 'whatsapp' => '931584005', 'address' => 'Viana - Luanda Sul', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Bazar da Allina', 'company_name' => 'Bazar da Allina', 'slug' => 'bazar-da-allina', 'sku_code' => 'ALLI', 'phone' => '949780391', 'whatsapp' => '949780391', 'address' => 'Kimbango - Estrada novo campo', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Bazar da Ira', 'company_name' => 'Bazar da Ira', 'slug' => 'bazar-da-ira', 'sku_code' => 'BIRA', 'phone' => '955194473', 'whatsapp' => '938839190', 'address' => 'Patriota', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Ró Élégance', 'company_name' => 'Ró Élégance', 'slug' => 'ro-elegance', 'sku_code' => 'ROEL', 'email' => 'roloja540@gmail.com', 'phone' => '951770524', 'whatsapp' => '951770524', 'address' => 'Prenda', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'AyaBelle', 'company_name' => 'AyaBelle', 'slug' => 'ayabelle', 'sku_code' => 'AYAB', 'phone' => '945500020', 'whatsapp' => '945500020', 'address' => 'Gamek - Perto do nosso Centro', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Rosa Neide', 'company_name' => 'Fardo da Rosa', 'slug' => 'fardo-da-rosa', 'sku_code' => 'ROSA', 'email' => 'rosaneide714@gmail.com', 'phone' => '922577989', 'whatsapp' => '922577989', 'address' => 'Cazenga - Paragem do Hospital dos Cajueiros', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Mille xtylus Boutique', 'company_name' => 'Mille xtylus Boutique', 'slug' => 'mille-xtylus', 'sku_code' => 'MILL', 'phone' => '912408340', 'whatsapp' => '912408340', 'address' => 'Camama', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Naita Angola', 'company_name' => 'Naita Angola', 'slug' => 'naita-angola', 'sku_code' => 'NAIT', 'phone' => '940276604', 'whatsapp' => '972351199', 'address' => 'Camama 1 - Rua do Banco Atlântico', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Marcia Saluvo', 'company_name' => 'Marcia Saluvo', 'slug' => 'marcia-saluvo', 'sku_code' => 'MARC', 'phone' => '900000001', 'address' => 'Sequele', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true, 'notes' => 'Sem telefone registado'],
            ['name' => 'Rossana Pedro', 'company_name' => 'Rossana Pedro', 'slug' => 'rossana-pedro', 'sku_code' => 'ROSS', 'phone' => '943148829', 'whatsapp' => '943148829', 'address' => 'Zango', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Encantos da Jó', 'company_name' => 'Encantos da Jó', 'slug' => 'encantos-da-jo', 'sku_code' => 'ENJO', 'email' => 'jornezajoao@gmail.com', 'phone' => '944503494', 'whatsapp' => '944503494', 'address' => 'Vila de Viana', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Hello Mulheres', 'company_name' => 'Hello Mulheres', 'slug' => 'hello-mulheres', 'sku_code' => 'HELL', 'phone' => '972594060', 'whatsapp' => '972594060', 'address' => 'Viana - Grafanil Bar', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Teresa Rodrigues', 'company_name' => 'Teresa Rodrigues', 'slug' => 'teresa-rodrigues', 'sku_code' => 'TERE', 'phone' => '932033852', 'whatsapp' => '932033852', 'address' => 'Ilha de Luanda', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Império Feminino', 'company_name' => 'Império Feminino', 'slug' => 'imperio-feminino', 'sku_code' => 'IMPE', 'phone' => '945276266', 'whatsapp' => '945276266', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Sita\'s Closet', 'company_name' => 'Sita\'s Closet', 'slug' => 'sitas-closet', 'sku_code' => 'SITA', 'phone' => '949406884', 'whatsapp' => '949406884', 'address' => 'Camama 1 - Casa Prelex', 'city' => 'Luanda', 'province' => 'Luanda', 'is_consignment' => true],
            ['name' => 'Núria Iracelma', 'company_name' => 'Teu Estilo', 'slug' => 'teu-estilo', 'sku_code' => 'TEST', 'phone' => '928496036', 'whatsapp' => '928496036', 'address' => 'Kikagil', 'city' => 'Luanda', 'province' => 'Luanda', 'payment_terms' => 'cash', 'is_consignment' => false, 'rating' => 5.00, 'notes' => 'Fornecedor interno - estoque próprio da Teu Estilo'],
        ];

        foreach ($suppliers as $data) {
            // Preencher defaults para campos opcionais não definidos
            $data = array_merge([
                'tax_id' => null,
                'email' => null,
                'whatsapp' => null,
                'address' => null,
                'country' => 'Angola',
                'payment_terms' => 'custom',
                'bank_name' => null,
                'bank_account' => null,
                'commission_percentage' => null,
                'rating' => null,
                'is_active' => true,
                'notes' => null,
            ], $data);

            Supplier::query()->updateOrCreate(
                ['sku_code' => $data['sku_code']],
                $data,
            );
        }
    }
}