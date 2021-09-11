<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [1,2],
            [2,2],
            [3,2],
            [4,2],
            [5,2],
            [6,2],
        ];

        foreach ($roles as $role) {
            DB::table('user_roles')->insert([
               'user_id' => $role[0],
               'role_id' => $role[1]
            ]);
        }
    }
}
