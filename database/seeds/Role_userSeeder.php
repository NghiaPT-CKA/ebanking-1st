<?php

use Illuminate\Database\Seeder;

class Role_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\RoleUser::class, 10)->create();
    }
}
