<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        factory(App\Car::class, 50)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
    }
}