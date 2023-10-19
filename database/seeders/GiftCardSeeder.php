<?php

namespace Database\Seeders;

use App\Models\GiftCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class GiftCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path('seeders/giftcard.csv');

        if (($handle = fopen($path, 'r')) !== FALSE)
        {
            $first = true;
            while(($row = fgetcsv($handle, 0, ',')) !== FALSE)
            {
                if($first) {
                    $first = false;
                    continue;
                }

                GiftCard::firstOrCreate([
                    'username'      => $row[0],
                    'password'      => $row[1],
                    'user_id'       => null,
                    'amount'        => intval($row[2]),
                    'delivery_date' => null,
                    'expiration'    => $row[3],
                ]);
            }
        }
    }
}
