<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 5)->create()->each(function($item) {
            $item->todos()->saveMany(factory(\App\Todo::class, 5)->make());
        });
    }
}
