<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TblAdminUsersInfoTableSeeder::class);
        $this->call(TeamMemberTableSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CurrencySeeder::class);
        



    }
}
