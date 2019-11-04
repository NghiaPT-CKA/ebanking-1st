<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\ReceiverAccount;
use Faker\Generator as Faker;

$factory->define(ReceiverAccount::class, function (Faker $faker) {
    $data   =   DB::table('banks')->get();
    foreach ($data as $k => $v){
        $bank[] = $data[$k]->id;
    };
    return [
        'id' => $faker->unique()->numerify('1#########'),
        'name' => $faker->name,
        'bank_id' => $faker->randomElement($bank),
        'ballance' =>$faker->numerify('##000000'),
    ];
});
