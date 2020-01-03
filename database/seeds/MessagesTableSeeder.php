<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1,20) as $index) {
            DB::table('messages')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker ->lastName,
                'title' => $faker->realText(30),
                'email' => $faker->email,
                'message' => $faker->realText(),
                'read' => 0,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
