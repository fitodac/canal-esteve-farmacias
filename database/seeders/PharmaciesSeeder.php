<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PharmaciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('seeders/pharmacies.csv');
        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                if(!$row[0] && !$row[1]) {
                    Log::alert(['farmacia sin codigo/nif', $row]);
                    continue;
                }

                Pharmacy::firstOrCreate([
                    'code'      => $row[0],
                    'nif'       => $row[1],
                    'name'      => $row[2]
                ]);
            }
        }
    }
}
