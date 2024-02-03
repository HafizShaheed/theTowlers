<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class YearRecordForFy1ToFy5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('year_record_for_fy1_to_fy5s')->insert([
            [
                'id' => 1,
                'year' => '2015-16',
            ],
            [
                'id' => 2,
                'year' => '2016-17',
            ],
            [
                'id' => 3,
                'year' => '2017-18',
            ],
            [
                'id' => 4,
                'year' => '2018-19',
            ],
            [
                'id' => 5,
                'year' => '2019-20',
            ],
            [
                'id' => 6,
                'year' => '2020-21',
            ],
            [
                'id' => 7,
                'year' => '2021-22',
            ],
            [
                'id' => 8,
                'year' => '2022-23',
            ],
            [
                'id' => 9,
                'year' => '2023-24',
            ],
            [
                'id' => 10,
                'year' => '2024-25',
            ],
          
            
          
          
          
            // Add more user data here if needed
        ]);
    }
}
