<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Account;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

$factory->define(Account::class, function (Faker $faker) {
    $data   =   DB::table('users')->get();
    foreach ($data as $k => $v){
        $user[] = $data[$k]->id;
    };
    $data   =   DB::table('categories')->get();
    foreach ($data as $k => $v){
        $category[] = $data[$k]->id;
    };
    return [
    'id' => $faker->unique()->numerify('1#########'),
    'user_id' =>$faker->randomElement($user),
    'ballance' =>$faker->numerify('##000000'),
    'category_id'  => $faker->randomElement($category),
    ];
});
