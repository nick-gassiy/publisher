<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['andriymaya@gmail.com' , '1' , 'andriymaya'],
            ['petrsimoniuk@gmail.com' , '1' , 'petrsimoniuk'],
            ['staff@gmail.com' , '1' , 'staff'],
        ];

        $authors = [
          ['ray-brad@yahoo.com' , '1' , 'raybrad'],
          ['levt@yahoo.com' , '1' , 'levt'],
          ['fdost@yahoo.com' , '1' , 'fdost']
        ];

        foreach ($authors as $user){
            DB::table('users')->insert([
                    'email' => $user[0],
                    'password' => Hash::make($user[1]),
                    'username' => $user[2]
                ]
            );
        }
    }
}
