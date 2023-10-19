<?php

namespace Database\Seeders;

use App\Models\Library;
use App\Models\Product;
use App\Models\Category;
use App\Models\ContentType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LibrarySeeder extends Seeder
{
    use WithoutModelEvents;

    private $product = [
        'Aquoral® Multidosis' => 6,
        'Aquoral® Monodosis' => 5,
        'Aquoral® Forte Multidosis' => 7,
        'Aquoral® Forte Monodosis' => 7,
        'Aquoral® Lipo Multidosis' => 8,
        'Aquoral® Noche' => 9,
        'RepelBite Familiar' => 15,
        'RepelBite Xtreme' => 16,
        'RepelBite Niños Spray' => 17,
        'RepelBite Herbal Spray' => 19,
        'RepelBite Natural Parches' => 20,
        'RepelBite Natural Pulseras' => 21,
        'RepelBite Natural Barra' => 22,
        'RepelBite Natural Loción' => 23,
        'AfterBite Original' => 12,
        'AfterBite Xtreme' => 13,
        'Pulsera RepelBite Niños' => 18,
        'Dormidina® Doxilamina 25mg' => 1,
        'Dormidina® Doxilamina 12,5mg' => 1,
        'Dorminatur® Melatonina Comprimidos' => 2,
        'Dorminatur® Melatonina Gummies' => 2,
        'Dorminatur® Valeriana' => 3,
        'Dorminatur® Triple Acción' => 4,
        'Dormidina® Doxilamina' => 1,
        'Triptomax' => 10,
        'Triptomax Balance' => 11,
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('seeders/library.csv');
        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                $library = new Library;
                $library->material = $row[0];
                $library->category_id = $this->getCategoryIdByName($row[1]);
                $library->content_type_id = $this->getContentTypeIdByType($row[3]);
                $library->channel_id = 1;
                $library->image = $this->inArrayImage($row[0]);
                $library->link = asset(Storage::disk('public')->url('library/resources/'.$row[4]));;
                $library->save();

                $products = $this->getProductsIdByNames($row[2]);

                foreach ($products as $product) {
                    $library->products()->attach($product);
                }
            }
        }
    }

    public function getCategoryIdByName($name) {
        return Category::where('name', $name)->first()->id;
    }

    public function getContentTypeIdByType($type) {
        return ContentType::where('type', $type)->first()->id;
    }

    public function getProductsIdByNames($names) {
        $name = explode(PHP_EOL, $names);

        foreach ($name as $value) {
            $products[] = $this->product[$value];
        }

        return  Product::whereIn('id', $products)->get();
    }

    public function inArrayImage($name) {
        $images = [
            'AfterBite' => 'afterbite_492x170.jpg',
            'Afterbite' => 'afterbite_492x170.jpg',
            'Aquoral' => 'aquoral_492x170.jpg',
            'Dormidina' => 'dormidina_492x170.jpg',
            'DormiNatur' => 'dorminatur_492x170.jpg',
            'Dorminatur' => 'dorminatur_492x170.jpg',
            'RepelBite' => 'repelbite_492x170.jpg',
            'Repelbite' => 'repelbite_492x170.jpg',
            'Triptomax' => 'triptomax_492x170.jpg',
        ];

        foreach(array_keys($images) as $value){
            if(str_contains($name, $value)) {
                return asset(Storage::disk('public')->url('library/'.$images[$value]));
            }
        }

        return '/img/no-picture.svg';
    }
    /**
     * $row[0] == material
     * $row[1] == Categoría
     * $row[2] == Producto
     * $row[3] == Tipo de contenido
     * $row[4] == Link al material
     */
}
