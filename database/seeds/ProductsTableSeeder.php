<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::firstOrCreate([
            'name' => 'Jersey Ac Milan',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/jersey-ac-milan.png',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Barcelona Away', 
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/barcelona-away.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Barcelona Keeper',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/barcelona-keeper.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Jersey Barcelona', 
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/jersey-barcelona.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Jersey Chelsea', 
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/jersey-chelsea.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Jersey City',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/jersey-city.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]);
        $product = Product::firstOrCreate([
            'name' => 'Jersey Dortmund', 
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 120000,
            'stock' => 100,
            'image' => '/upload/products/jersey-dortmund.jpg',
            'status' => 'publish',
            'category_id' => 1
        ]); 
    }
}
