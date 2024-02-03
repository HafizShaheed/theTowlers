<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'id' => 1,
                'dept_name' => 'Finance',
                'created_at' => now(),

            ],
            [
                'id' => 2,
                'dept_name' => 'HR',
                'created_at' => now(),

            ],
            [
                'id' => 3,
                'dept_name' => 'Sales',
                'created_at' => now(),

            ],
            [
                'id' => 4,
                'dept_name' => 'Procurement',
                'created_at' => now(),

            ],
            [
                'id' => 5,
                'dept_name' => 'Marketing',
                'created_at' => '2023-08-28 18:01:09',

            ],
          
            // Add more user data here if needed
        ]);
    }
}
