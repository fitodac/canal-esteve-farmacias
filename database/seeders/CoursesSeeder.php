<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name'              => 'Curso de Laravel',
                'subtitle'          => 'curso laravel 10',
                'format_id'         => 1,
                'short_description' => 'Aprende a desarrollar aplicaciones web con Laravel',
                'image'             => 'https://placehold.co/400x600',
                'score'             => 100,
                'title'             => 'title demo 1',
                'long_description'  => 'description demo 1',
                'teacher'           => json_encode([
                    ['name' => 'Juan Perez', 'profession' => 'Dev', 'description' => 'lorem ipsum dolot', 'specialty' => 'Datos especialidad', 'image' => 'https://placehold.co/400x400']
                ]),
                'category_id'       => rand(1,5),
                'video'             => null,
            ],
            [
                'name'              => 'Curso de React',
                'subtitle'          => 'curso React 10',
                'format_id'         => 1,
                'short_description' => 'Aprende a desarrollar aplicaciones web con React',
                'image'             => 'https://placehold.co/400x600',
                'score'             => 100,
                'title'             => 'title demo 2',
                'long_description'  => 'description demo 2',
                'teacher'           => json_encode([
                    ['name' => 'Juan Perez', 'profession' => 'Dev', 'description' => 'lorem ipsum dolot', 'specialty' => 'Datos especialidad', 'image' => 'https://placehold.co/400x400']
                ]),
                'category_id'       => rand(1,5),
                'video'             => null,
            ],
            [
                'name'              => 'Curso de Angular',
                'subtitle'          => 'curso Angular 10',
                'format_id'         => 1,
                'short_description' => 'Aprende a desarrollar aplicaciones web con Angular',
                'image'             => 'https://placehold.co/400x600',
                'score'             => 100,
                'title'             => 'title demo 3',
                'long_description'  => 'description demo 3',
                'teacher'           => json_encode([
                    ['name' => 'Juan Perez', 'profession' => 'Dev', 'description' => 'lorem ipsum dolot', 'specialty' => 'Datos especialidad', 'image' => 'https://placehold.co/400x400']
                ]),
                'category_id'       => rand(1,5),
                'video'             => null,
            ],
            [
                'name'              => 'Webinar de Angular',
                'subtitle'          => 'webinar Angular 10',
                'format_id'         => 2,
                'short_description' => null,
                'image'             => 'https://placehold.co/400x600',
                'score'             => null,
                'title'             => 'title demo 3',
                'long_description'  => 'description demo 3',
                'teacher'           => json_encode([
                    ['name' => 'Juan Perez', 'profession' => 'Dev', 'description' => 'lorem ipsum dolot', 'specialty' => 'Datos especialidad', 'image' => 'https://placehold.co/400x400'],
                    ['name' => 'Juan Perez', 'profession' => 'Dev', 'description' => 'lorem ipsum dolot', 'specialty' => 'Datos especialidad', 'image' => 'https://placehold.co/400x400']
                ]),
                'category_id'       => rand(1,5),
                'video'             => '70mRfItBMfc'
            ]
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
