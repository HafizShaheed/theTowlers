<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'role_name' => 'CEO',
                'created_at' => now(),

            ],
            [
                'id' => 2,
                'role_name' => 'Manager',
                'created_at' => now(),

            ],
          
          
            // Add more user data here if needed
        ]);
    }
}
