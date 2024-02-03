<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'Himachal Pradesh',
            'Punjab',
            'Uttarakhand',
            'Uttar Pradesh',
            'Haryana',
            'Delhi',
            'Chandigarh',
            'Jammu & Kashmir',
            'Bihar',
            'Odisha',
            'Jharkhand',
            'West Bengal',
            'Andhra Pradesh',
            'Karnataka',
            'Kerala',
            'Tamil Nadu',
            'Telangana',
            'Puducherry',
            'Rajasthan',
            'Gujarat',
            'Maharashtra',
            'Chhattisgarh',
            'Madhya Pradesh',
            'Dadra & Nagar Haveli',
            'Daman & Diu',
            'Goa',
            'Assam',
            'Arunachal Pradesh',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Sikkim',
            'Nagaland',
            'Tripura',
        ];

        foreach ($states as $state) {
            DB::table('states')->insert([
                'state_name' => $state,
            ]);
        }
    }
}
