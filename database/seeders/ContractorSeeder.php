<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contractors = [
            ['Партнер-Принт', 'Ленина 15' , 'info@partner-print.com','+380671124567'],
            ['ЮниКом', 'Малая Арнауцкая 10' , 'unicom@gmail.com','+380988722421'],
            ['Империя печати', 'Успенская 89' , 'errprint@gmail.com','+380730806897']
        ];

        foreach ($contractors as $contractor){
            DB::table('contractors')->insert([
                'name'=>$contractor[0],
                'address'=>$contractor[1],
                'email'=> $contractor[2],
                'phone' => $contractor[3]
            ]);
        }
    }
}
