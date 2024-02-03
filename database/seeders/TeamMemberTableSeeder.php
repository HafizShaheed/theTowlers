<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class TeamMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_users')->insert([

            [
                'id' => 1,
                'first_name' => 'info',
                'last_name' => 'info',
                'user_name' => 'teaminfo',
                'team_email' => 'teamcrm@erp.com',
                'password' => Hash::make('secret123'), // Hash the secret
                'status' => 1,
                'created_at' => '2023-08-28 18:01:09',
                'updated_at' => '2023-08-28 18:01:09',
            ],
            [
                'id' => 2,
                'first_name' => 'teamMember',
                'last_name' => 'teamMember',
                'user_name' => 'teamMember',
                'team_email' => 'team@iscreening.com',
                'password' => Hash::make('secret123'), // Hash the secret
                'status' => 1,
                'created_at' => '2023-08-28 18:01:09',
                'updated_at' => '2023-08-28 18:01:09',
            ],


            // Add more user data here if needed
        ]);
    }
}
