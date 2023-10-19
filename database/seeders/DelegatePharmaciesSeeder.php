<?php

namespace Database\Seeders;

use App\Models\Pharmacy;
use Illuminate\Database\Seeder;

class DelegatePharmaciesSeeder extends Seeder
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


                $pharmacy = Pharmacy::where('nif', $row[1])->first();

                if($pharmacy) {
                    $pharmacy->delegate = $row[3] ?? '';
                    $pharmacy->save();
                }
            }
        }
    }
}
