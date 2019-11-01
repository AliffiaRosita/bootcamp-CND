<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_category =[
            [
            'name'=> 'News',
            'description' => 'News Post',
            ],
            [
            'name'=> 'Tips',
            'description' => 'Tips and Trick Post',
            ],
            [
            'name'=> 'Magazine',
            'description' => 'Magazine Post',
            ]
        ];
        foreach ($list_category as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'description'=> $category['description']
            ]);
        }

}
}
