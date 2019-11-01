<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <10 ; $i++) {
            DB::table('posts')->insert([
                    'author_id'=> 1,
                    'title'=>$faker->name,
                    'content'=>$faker->text,
                    'is_draft'=>$faker->numberBetween(0,1),
                ]);
        }
    }
}
