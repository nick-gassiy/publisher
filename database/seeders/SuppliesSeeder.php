<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplies = [
            [Carbon::create(2022,10,12),600,100,1,2],
            [Carbon::create(2022,9,24),200,150,2,1],
            [Carbon::create(2022,5,2),400,150,3,3],
            [Carbon::create(2022,5,2),400,150,4,3],
        ];

        foreach ($supplies as $supply){
            DB::table('supplies')->insert([
              'date' => $supply[0],
              'price' => $supply[1],
                'quantity' => $supply[2],
                'book_id' => $supply[3],
                'contractor_id' => $supply[4]
            ]);
        }
    }
}
