<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['Рей' , 'Бредбери', 'Рей Бредбери','raybradberry@gmail.com','+102436678092',4],
            ['Лев' , 'Толстой', 'Лев Толстой', 'levtolstoi@gmail.com','+814464143211',5],
            ['Федор' , 'Достоевский', 'Федор Достоевский', 'fdostoevskiy@gmail.com','+800082378332',6],
        ];

        foreach ($authors as $author){
            DB::table('authors')->insert([
                'name' => $author[0],
                'surname' => $author[1],
                'pseudonym' => $author[2],
                'email' => $author[3],
                'phone' => $author[4],
                'user_id' => $author[5]
            ]);
        }
    }
}
