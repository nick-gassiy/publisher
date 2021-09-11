<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = ['Редактор'];
        foreach ($positions as $position){
            DB::table('positions')->insert([
                'name' => $position
            ]);
        }
    }
}
