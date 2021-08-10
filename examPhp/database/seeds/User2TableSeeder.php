<?php

use Carbon\Factory;
use Illuminate\Database\Seeder;

class User2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\User2::class, 3)->create();
    }
}
