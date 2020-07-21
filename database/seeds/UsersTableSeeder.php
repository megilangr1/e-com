<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'sheptian', 
            'email' => 'sheptian@gmail.com', 
            'password' => '$2y$10$N6t/MS0i0M6oEk8gODvWjeIY7e6QGJfcQHeRjDM7AeRTp0Z842f9q', 
            'role' => 'admin',
        ]);

        $user = User::firstOrCreate([
            'name' => 'rahma', 
            'email' => 'rahma@gmail.com', 
            'password' => '$2y$10$HfDhlVWo8YpsfIK9FP/LQOIolYmU5IGZU/9DPiGqn/rIkyb4SXhja',
            'role' => 'customer',
        ]);

        $user = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        
        $user = User::firstOrCreate([
            'name' => 'dummy',
            'email' => 'dummy@mail.com',
            'password' => bcrypt('dummy'),
            'role' => 'customer',
        ]);
    }
}
