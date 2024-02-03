<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->insert([
            [
                'id' => 1,
                'zone_name' => 'North Zone',
                'created_at' => now(),

            ],
            [
                'id' => 2,
                'zone_name' => 'North West Zone',
                'created_at' => now(),

            ],
            [
                'id' => 3,
                'zone_name' => 'North East Zone',
                'created_at' => now(),

            ],
            [
                'id' => 4,
                'zone_name' => 'South Zone',
                'created_at' => now(),

            ],
            [
                'id' => 5,
                'zone_name' => 'South East Zone',
                'created_at' => now(),

            ],
            [
                'id' => 6,
                'zone_name' => 'South West Zone',
                'created_at' => now(),

            ],
            [
                'id' => 7,
                'zone_name' => 'East Zone',
                'created_at' => now(),

            ],
            [
                'id' => 8,
                'zone_name' => 'West Zone',
                'created_at' => now(),

            ],
            [
                'id' => 9,
                'zone_name' => 'Central',
                'created_at' => now(),

            ],


            // Add more user data here if needed
        ]);
    }
}
