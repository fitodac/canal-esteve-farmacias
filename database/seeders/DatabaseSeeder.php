<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            ChannelSeeder::class,
            ContentTypeSeeder::class,
            FamiliesSeeder::class,
            ProductsSeeder::class,
            LibrarySeeder::class,
            RoleSeeder::class,
            PharmaciesSeeder::class,
            UserSeeder::class,
            FormatSeeder::class,
            FAARoleSeeder::class,
        ]);
    }
}
