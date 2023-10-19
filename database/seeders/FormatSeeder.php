<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats = [
            [
                'color' => 'purple',
                'type' => 'Curso de producto',
            ],
            [
                'color' => 'red',
                'type' => 'Webinar',
            ],
        ];

        foreach ($formats as $format) {
            Format::create($format);
        }
    }
}
