<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = [
            [
                "title" => 'Titulo 1',
                "description" => 'Descripción 1',
                "image" => 'https://esteve.test/storage/challenge/Wi2kavXFFp.png',
                "challenge_type" => 'recommendation',
                "score" => '10',
                "date_from" => '2023-03-10',
                "date_to" => '2023-03-23',
                "participation" => '[{"name":"Afterbite Original"},{"name":"Repelbite Familiar"},{"name":"Triptomax"},{"name":"Dorminatur"}]',
                "active" => 1,
                'legal' => 'https://www.africau.edu/images/default/sample.pdf'
            ],
            [
                "title" => 'Titulo 2',
                "description" => 'Descripción 2',
                "image" => 'https://esteve.test/storage/challenge/A8O4AngeAD.png',
                "challenge_type" => 'visibility',
                "score" => '10',
                "date_from" => '2023-03-10',
                "date_to" => '2023-03-24',
                "participation" => '[{"name":"Nombre Gama 1","material":"Nombre material 1","score":"5","image":"https://esteve.test/storage/challenge/7g8yA76IpI.png"},{"name":"Nombre Gama 2","material":"Nombre material 2","score":"5","image":"https://esteve.test/storage/challenge/pGiJhtHArD.png"}]',
                "active" => 1,
                'legal' => 'https://www.africau.edu/images/default/sample.pdf'
            ]
        ];

        foreach ($challenges as $challenge) {
            Challenge::create($challenge);
        }
    }
}
