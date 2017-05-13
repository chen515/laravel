<?php

use App\User;
use Illuminate\Database\Seeder;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'max',
            'username' => 'max123',
            'password' => Hash::make('1234'),
            'email' => 'max@laravel.com'
        ));

    }
}