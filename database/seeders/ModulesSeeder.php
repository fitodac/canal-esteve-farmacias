<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'course_id' => 1,
                'title' => 'Introducción a Laravel',
                'description' => 'Aprende lo básico sobre Laravel',
                'tag' => 'introduccion',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => null,
                'order' => 1,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 1,
                'title' => 'Controladores en Laravel',
                'description' => 'Aprende a trabajar con controladores en Laravel',
                'tag' => 'controladores',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 1,
                'order' => 2,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 1,
                'title' => 'Vistas en Laravel',
                'description' => 'Aprende a trabajar con vistas en Laravel',
                'tag' => 'vistas',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 2,
                'order' => 3,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 2,
                'title' => 'Introducción a React',
                'description' => 'Aprende lo básico sobre React',
                'tag' => 'introduccion',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => null,
                'order' => 1,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 2,
                'title' => 'Componentes en React',
                'description' => 'Aprende a trabajar con componentes en React',
                'tag' => 'componentes',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 4,
                'order' => 2,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 2,
                'title' => 'Hooks en React',
                'description' => 'Aprende a trabajar con hooks en React',
                'tag' => 'hooks',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 5,
                'order' => 3,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 3,
                'title' => 'Introducción a Angular',
                'description' => 'Aprende lo básico sobre Angular',
                'tag' => 'introduccion',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => null,
                'order' => 1,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 3,
                'title' => 'Componentes en Angular',
                'description' => 'Aprende a trabajar con componentes en Angular',
                'tag' => 'componentes',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 7,
                'order' => 2,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ],
            [
                'course_id' => 3,
                'title' => 'Servicios en Angular',
                'description' => 'Aprende a trabajar con servicios en Angular',
                'tag' => 'servicios',
                'video' => 'Akr7V7Uq9_4',
                'parent_module_id' => 8,
                'order' => 3,
                'teacher' => json_encode([
                    'name' => 'Juan Perez',
                    'profession' => 'Dev',
                    'description' =>
                    'lorem ipsum dolot',
                    'specialty' => 'Datos especialidad',
                    'image' => 'https://placehold.co/400x400'
                ]),
            ]
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
