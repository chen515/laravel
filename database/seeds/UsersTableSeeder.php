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
        User::create(array(
            'name' => 'david',
            'username' => 'david123',
            'password' => bcrypt('1234'),
            'email' => 'david@laravel.com'
        ));
    }
}