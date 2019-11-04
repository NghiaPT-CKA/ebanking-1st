<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Model\RoleUser::class, function (Faker $faker) {
    $data   =   DB::table('users')->get();
    foreach ($data as $k => $v){
        $user[] = $data[$k]->id;
    };
    return [
        'user_id' =>$faker->unique()->randomElement($user),
        'role_id' => 1,
    ];
});
