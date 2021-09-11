<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            ['Андрей', 'Маяченко','andriy01@gmail.com','Троицкая 30', '+380671134532',1,1],
            ['Петр', 'Симонюк','pertKi@gmail.com','Кирова 44', '+380753009801',1,2],
            ['Вадим', 'Терещенко','tereshenko@gmail.com','Бунина 11', '+380678892059',1,3],
        ];
        foreach ($employees as $employee){
            DB::table('employees')->insert([
                'name' => $employee[0],
                'surname' => $employee[1],
                'email' => $employee[2],
                'address' => $employee[3],
                'phone' => $employee[4],
                'position_id' => $employee[5],
                'user_id' => $employee[6],
                ]);
        }
    }
}
