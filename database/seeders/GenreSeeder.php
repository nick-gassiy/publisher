<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Мистика', 'Комедия',
            'Детектив', 'Поэзия',
            'Проза','Повесть',
            'Драма','Мелодрама'
        ];

        foreach ($genres as $genre){
            DB::table('genres')->insert([
                'name' => $genre,
            ]);
        }
    }
}
