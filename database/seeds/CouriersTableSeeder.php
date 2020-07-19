<?php

use App\Courier;
use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courier = Courier::firstOrCreate([
            'id' => 1,
            'order_id' => 1,
            'code' => 'jne',
            'destination' => 'Jakarta Pusat',
            'type' => 'Yakin Esok Sampai (YES)',
            'price' => 18000
        ]);
    }
}
