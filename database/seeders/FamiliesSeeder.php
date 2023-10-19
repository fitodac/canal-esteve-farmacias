<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FamiliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $families = [
            [ 'name' => 'dormi' ],
            [ 'name' => 'aquoral' ],
            [ 'name' => 'triptomax' ],
            [ 'name' => 'afterbite' ],
            [ 'name' => 'repelbite' ],
        ];

        foreach ($families as $family) {
            Family::create($family);
        }
    }
}
