<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    const Counties = [
            ['name' => 'Pest'],
            ['name' => 'Fejér'],
            ['name' => 'Tolna'],
            ['name' => 'Bács-Kiskun'],
            ['name' => 'Baranya'],
            ['name' => 'Békés'],
            ['name' => 'Borsod-Abaúj-Zemplén'],
            ['name' => 'Csongrád-Csanád'],
            ['name' => 'Győr-Moson-Sopron'],
            ['name' => 'Hajdú-Bihar'],
            ['name' => 'Heves'],
            ['name' => 'Jász-Nagykun-Szolnok'],
            ['name' => 'Komárom-Esztergom'],
            ['name' => 'Nógrád'],
            ['name' => 'Somogy'],
            ['name' => 'Szabolcs-Szatmár-Bereg'],
            ['name' => 'Vas'],
            ['name' => 'Veszprém'],
            ['name' => 'Zala']
        ];

    public function run(): void
    {
        DB::table('counties')->delete();

        foreach (self::Counties as $county) {
            DB::table('counties')->insert($county);
        }
    }
}
