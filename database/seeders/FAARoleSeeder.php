<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FAARoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'readable_name' => 'Farmaceútico Adjunto',
            'name' => 'adjunto',
            'short_name' => 'FAA',
        ]);

        Role::where('name', 'admin')->update(['readable_name' => 'Administrador', 'short_name' => 'admin' ]);
        Role::where('name', 'titular')->update(['readable_name' => 'Farmaceútico Titular', 'short_name' => 'FA' ]);
        Role::where('name', 'auxiliar')->update(['readable_name' => 'Auxiliar', 'short_name' => 'AX' ]);
    }
}
