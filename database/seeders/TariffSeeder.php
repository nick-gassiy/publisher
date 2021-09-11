<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tariffs = [
            ['Стартовый', 15000],
            ['Начинающий', 30000],
            ['Обычный' , 50000],
            ['Продвинутый',75000],
            ['Максимальный',100000]
        ];

        foreach ($tariffs as $tariff) {
            DB::table('tariffs')->insert([
                'name' =>  $tariff[0],
                'price' => $tariff[1]
        ]);
        }
    }
}
