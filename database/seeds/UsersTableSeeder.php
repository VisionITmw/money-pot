<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => "admin",
            'password' => bcrypt("@12345678!"),
            'firstname' => "default",
            'surname' => "user",
            "email" => "admin@money-pot.tech",
            'phone' => "+265882370345"
        ]);
    }
}
