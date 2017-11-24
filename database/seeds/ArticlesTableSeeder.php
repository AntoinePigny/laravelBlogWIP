<?php

use Illuminate\Database\Seeder;


class ArticlesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i=0; $i < 70; $i++)
        {
            DB::table('articles')->insert([
            'title' => $faker->unique()->catchPhrase,
            'content' => $faker->realText(),
            'created_at' => $faker->dateTimeBetween('2014-04-23', '2016-05-11'),
            'published_at' => $faker->dateTimeBetween('2016-05-11', '2017-05-11'),
            'updated_at' => $faker->dateTimeBetween('2017-05-11'),
            'status' => $faker->numberBetween(1, 4),
            'users_id' => $faker->numberBetween(1, 500),
            'categories_id' => $faker->numberBetween(1, 20),
            ]);
        }

    }
}
