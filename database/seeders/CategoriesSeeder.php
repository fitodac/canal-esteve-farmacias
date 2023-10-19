<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ 'name' => 'Sueño', 'color' => 'blue'],
            [ 'name' => 'Salud ocular', 'color' => 'sky'],
            [ 'name' => 'Bienestar emocional', 'color' => 'purple'],
            [ 'name' => 'Mosquitos', 'color' => 'magenta'],
            [ 'name' => 'Colesterol', 'color' => 'green']
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'color' => $category['color'],
            ]);
        }
    }
}
