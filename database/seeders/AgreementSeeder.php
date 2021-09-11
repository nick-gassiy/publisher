<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgreementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agreements = [
            [Carbon::create(2022,6,1),Carbon::create(2022,12,1),1,3],
            [Carbon::create(2022,3,1),Carbon::create(2023,4,1),2,4],
            [Carbon::create(2022,8,1),Carbon::create(2022,10,1),3,5],
        ];

        foreach ($agreements as $agreement){
            DB::table('agreements')->insert([
                'begin' => $agreement[0],
                'end'=> $agreement[1],
                'author_id' => $agreement[2],
                'tariff_id' => $agreement[3]
            ]);
        }
    }
}
