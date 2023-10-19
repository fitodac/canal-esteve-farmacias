<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('seeders/users.csv');
        $roleMain = Role::where('name', 'titular')->first();
        $roleOthers = Role::where('name', 'auxiliar')->first();
        $pharmacies = Pharmacy::get();

        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                try {
                    $pharmacy = $pharmacies->firstWhere('nif', $row[1]);

                    $user = User::firstOrCreate(
                        [
                            'email'         => $row[0],
                            'name'          => $row[5],
                            'pharmacy_id'   => $pharmacy->id,
                            'old'           => true
                        ]
                    );

                    if($row[3] == 'titular') {
                        $user->assignRole([$roleMain->id]);
                    } else {
                        $user->assignRole([$roleOthers->id]);
                    }
                } catch (\Exception $e) {
                    Log::info($row);
                }
            }
        }
    }
}
