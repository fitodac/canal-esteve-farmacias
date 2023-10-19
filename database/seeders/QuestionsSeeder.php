<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {

        $questions = [
            [
                'module_id' => 1,
                'question' => '¿Qué es Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un framework de PHP', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un lenguaje de programación', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un sistema operativo', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un gestor de bases de datos', 'valid' => false]
                ])
            ],
            [
                'module_id' => 1,
                'question' => '¿Qué patrón de diseño utiliza Laravel para trabajar con bases de datos?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'ORM', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'MVC', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Singleton', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Decorator', 'valid' => false]
                ])
            ],
            [
                'module_id' => 2,
                'question' => '¿Qué es un controlador en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una clase que maneja las solicitudes HTTP', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que devuelve una vista', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un archivo de configuración', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un componente de React', 'valid' => false]
                ])
            ],
            [
                'module_id' => 2,
                'question' => '¿Qué es una migración en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un archivo que define cambios en la estructura de la base de datos', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un archivo de configuración de la aplicación', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un archivo de traducción', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un archivo de pruebas', 'valid' => false]
                ])
            ],
            [
                'module_id' => 3,
                'question' => '¿Qué es una ruta en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una URL que se asocia a una acción en el controlador', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un archivo que define la estructura de la base de datos', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un archivo de configuración de la aplicación', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una función que devuelve una vista', 'valid' => false]
                ])
            ],
            [
                'module_id' => 3,
                'question' => '¿Qué es un middleware en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una capa intermedia entre la solicitud y la respuesta', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que devuelve una vista', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un archivo de traducción', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un componente de React', 'valid' => false]
                ])
            ],
            [
                'module_id' => 4,
                'question' => '¿Qué es una relación "uno a muchos" en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una relación en la que un registro de la tabla A se relaciona con varios registros de la tabla B', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una relación en la que un registro de la tabla A se relaciona con un solo registro de la tabla B', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una relación en la que varios registros de la tabla A se relacionan con varios registros de la tabla B', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'No existe tal relación en Laravel', 'valid' => false]
                ])
            ],
            [
                'module_id' => 4,
                'question' => '¿Qué es un "accesor" en Laravel?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un método que se ejecuta automáticamente cuando se accede a un atributo de un modelo', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que devuelve una vista', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un archivo de traducción', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un componente de React', 'valid' => false]
                ])
            ],
            [
                'module_id' => 5,
                'question' => '¿Qué es un hook en React?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una función que permite interactuar con el ciclo de vida de un componente', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un componente de React', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una librería de animación', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una herramienta para probar componentes', 'valid' => false]
                ])
            ],
            [
                'module_id' => 5,
                'question' => '¿Qué es el hook useState en React?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un hook que permite agregar estado a un componente', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un hook que permite agregar efectos secundarios a un componente', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un hook es un gancho', 'valid' => false ],
                    [ 'id' => '4', 'answer' => '' , 'valid' => false]
                ])
            ],
            [
                'module_id' => 6,
                'question' => '¿Qué es Redux en React?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una librería de gestión del estado global de una aplicación', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una herramienta de construcción de componentes', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una herramienta de pruebas', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una herramienta de generación de documentación', 'valid' => false]
                ])
            ],
            [
                'module_id' => 6,
                'question' => '¿Qué es un "reducer" en Redux?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una función que especifica cómo cambia el estado de la aplicación en respuesta a una acción', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que retorna un nuevo estado sin modificar el estado anterior', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una función que se ejecuta cuando se agrega un nuevo estado a la aplicación', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una función que convierte un estado en un objeto JSON', 'valid' => false]
                ])
            ],
            [
                'module_id' => 7,
                'question' => '¿Qué es Angular?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un framework de desarrollo web de Google', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un lenguaje de programación', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un sistema de gestión de base de datos', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un servidor web', 'valid' => false]
                ])
            ],
            [
                'module_id' => 7,
                'question' => '¿Qué es una directiva en Angular?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Una instrucción que permite modificar el comportamiento de un elemento del DOM', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que devuelve una vista', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una herramienta de pruebas', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una herramienta de construcción de componentes', 'valid' => false]
                ])
            ],
            [
                'module_id' => 8,
                'question' => '¿Qué es una inyección de dependencias en Angular?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un patrón de diseño que permite separar la creación de objetos de su uso', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Una función que permite agregar efectos secundarios a un componente', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una herramienta de pruebas', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una herramienta de construcción de componentes', 'valid' => false]
                ])
            ],
            [
                'module_id' => 8,
                'question' => '¿Qué es un servicio en Angular?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un objeto que permite compartir datos y funcionalidades entre componentes', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un objeto que se utiliza para almacenar datos en la memoria del navegador', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Un objeto que se utiliza para crear instancias de componentes', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Una función que permite interactuar con el ciclo de vida de un componente', 'valid' => false]
                ])
            ],
            [
                'module_id' => 9,
                'question' => '¿Qué es Vue.js?',
                'answers' => json_encode([
                    [ 'id' => '1', 'answer' => 'Un framework de desarrollo web', 'valid' => true ],
                    [ 'id' => '2', 'answer' => 'Un sistema operativo', 'valid' => false ],
                    [ 'id' => '3', 'answer' => 'Una base de datos', 'valid' => false ],
                    [ 'id' => '4', 'answer' => 'Un servidor web', 'valid' => false]
                ])
            ]
        ];

        foreach($questions as $question) {
            Question::create($question);
        }
    }
}
