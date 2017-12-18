<?php

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
        $CreateUser = \App\User::create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => 'admin'
        ]);
    }
}
