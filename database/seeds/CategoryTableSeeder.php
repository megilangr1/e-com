<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::firstOrCreate([
            'name' => 'Jersey Bola',
            'slug' => 'jersey-bola',
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Jersey Basket',
            'slug' => 'jersey-basket', 
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Sepatu Futsal',
            'slug' => 'sepatu-futsal',
        ]);
        $category = Category::firstOrCreate([
            'name' => 'Handphone',
            'slug' => 'handphone',
        ]);
    }
}
