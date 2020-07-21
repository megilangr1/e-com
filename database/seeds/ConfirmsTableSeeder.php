<?php

use App\Confirm;
use Illuminate\Database\Seeder;

class ConfirmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirm = Confirm::firstOrCreate([
            'user_id' => 2, 
            'order_id' => 1, 
            'image' => '637839362.5364df0f88aaac995457673cc5d6b47a.jpg', 
            'status_order' => 'dibayar'
        ]);
    }
}
