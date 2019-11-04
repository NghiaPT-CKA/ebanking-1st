<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataInsert = [
            ['name' => 'Tài khoản thanh toán'],
            ['name' => 'Tài khoản tiết kiệm'],
        ];
            return  DB::table('categories')->insert($dataInsert);
    }
}
