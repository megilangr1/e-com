<?php

use App\Order_Product;
use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_product = Order_Product::firstOrCreate([
            'order_id' => 1, 
            'product_id' => 1,
            'qty' => 1,
            'subtotal'=> '120000.00'
        ]);
        
        $order_product = Order_Product::firstOrCreate([
            'order_id' => 1, 
            'product_id' => 2,
            'qty' => 1,
            'subtotal'=> '120000.00'
        ]);

        $order_product = Order_Product::firstOrCreate([
            'order_id' => 1, 
            'product_id' => 3,
            'qty' => 1,
            'subtotal'=> '120000.00'
        ]);

        $order_product = Order_Product::firstOrCreate([
            'order_id' => 1, 
            'product_id' => 4,
            'qty' => 1,
            'subtotal'=> '120000.00'
        ]);
    }
}
