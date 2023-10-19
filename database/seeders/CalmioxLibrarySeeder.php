<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CalmioxLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([ 'name' => 'Piel', 'color' => 'blue']);
        $family = Family::create(['name' => 'Calmiox']);

        $products = [
            [
                'family_id' => $family->id,
                'name' => 'Calmiox Crema',
                'image' => '/img/calmiox/calmiox-crema.webp',
                'image_width' => '160px',
                'type' => null,
                'description' => 'Útil en zonas pequeñas, alivia el picor de la piel por irritaciones y dermatitis de contacto, especial para el uso en prurito o irritación anal asociado con hemorroides.',
                'caution' => '',
                'category_slug' => 'calmiox',
                'slug' => 'calmiox-crema',
                'natural' => null,
            ],
            [
                'family_id' => $family->id,
                'name' => 'Calmiox Espuma',
                'image' => '/img/calmiox/calmiox-expuma-cutanea.webp',
                'image_width' => '160px',
                'type' => null,
                'description' => 'Útil cuando se usa en superficies extensas, especial para usar en zonas como el cuero cabelludo. Para el alivio temporal sintomático del picor de la piel (pero no del dolor) debido a pequeñas irritaciones de la misma, alergia por contacto con jabones, detergentes, metales, picaduras de insectos y ortigas.',
                'caution' => '',
                'category_slug' => 'calmiox',
                'slug' => 'calmiox-espuma',
                'natural' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
