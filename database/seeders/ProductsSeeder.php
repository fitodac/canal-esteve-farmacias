<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = [
            'dormi',
            'aquoral',
            'triptomax',
            'afterbite',
            'repelbite',
        ];

        foreach($seeders as $seeder) {
            $path = storage_path('seeders/'.$seeder.'.csv');
            $family = Family::where('name', $seeder)->first();

            if (($handle = fopen($path, 'r')) !== FALSE)
            {
                $first = true;
                while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
                {
                    if($first) {
                        $first = false;
                        continue;
                    }

                    $product = new Product;
                    $product->family_id = $family->id;
                    $product->name = $row[2];
                    $product->image = $row[0];
                    $product->image_width = $row[1];
                    $product->type = $row[3] ?: null;
                    $product->description = $row[4] ?: null;
                    $product->caution = $row[5] ?: null;
                    $product->category_slug = $row[6] ?: null;
                    $product->slug = $row[7] ?: null;
                    $product->natural = $row[8]
                        ? ($row[8] == false ? 0 : 1)
                        : null;
                    $product->save();
                }
            }
        }
    }
}
