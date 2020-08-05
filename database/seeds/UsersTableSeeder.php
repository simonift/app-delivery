<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'simon',
            'username' => 'sfaundezt',
            'email' => 'simon@gmail.com',
            'password' => bcrypt('12345'),
            'admin' => true

        ]);
    }
}
