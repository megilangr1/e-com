<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = Order::firstOrCreate([
            'user_id' => 2,
            'receiver' => 'Rahma Aulia', 
            'address' => 'Jalan Pagarsih Gg.Holili No.140 Blok 87', 
            'total_price' => 480000, 
            'date' => '2019-03-03',
            'status' => 'dibayar', 
        ]);
    }
}
