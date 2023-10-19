<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conten_types = [
            'De consulta',
            'Promocional',
            'Para los clientes'
        ];

        foreach ($conten_types as $conten_type) {
            ContentType::create([
                'type' => $conten_type,
            ]);
        }
    }
}
