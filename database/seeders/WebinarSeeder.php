<?php

namespace Database\Seeders;

use App\Models\Webinar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webinar::create([
            'title' => 'Evento 1',
            'subtitle' => 'Subtítulo del evento 1',
            'description' => 'Descripción del evento 1',
            'speaker' => json_encode([
                ["name"=>"Carson Hartman","profession"=>"Aliquam natus facere","description"=>"Repellendus Lorem p","image"=>"https://placehold.co/400x400"],
                ["name"=>"Juan Perez","profession"=>"Aliquam natus facere","description"=>"Repellendus Lorem p","image"=>"https://placehold.co/400x400"],
                ["name"=>"Jose Fernando","profession"=>"Aliquam natus facere","description"=>"Repellendus Lorem p","image"=>"https://placehold.co/400x400"],
                ["name"=>"Miguel Angel","profession"=>"Aliquam natus facere","description"=>"Repellendus Lorem p","image"=>"https://placehold.co/400x400"]
            ]),
            'schedule' => json_encode([["title"=>"Anim nisi voluptas a","description"=>"Eveniet voluptatem","from"=>"15:50","to"=>"16:50"],["title"=>"Magnam vitae magnam ","description"=>"Perspiciatis iste s","from"=>"16:55","to"=>"18:50"]]),
            'image' => 'https://placehold.co/400x600',
            'appointment_day' => '2023-03-18',
            'appointment_hour' => '15:50:00',
            'registration_form' => 'https://app.livestorm.co/p/b9526c41-f105-4a60-b363-4a17fa22b35e/form',
            'active' => true
        ]);

    }
}
