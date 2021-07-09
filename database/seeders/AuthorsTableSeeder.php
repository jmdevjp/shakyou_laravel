<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++) {
            $author = [
                'name' => $faker->name,
                'kana' => $faker->kanaName,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ];
            \Illuminate\Support\Facades\DB::table('authors')->insert($author);
        }
    }
}
