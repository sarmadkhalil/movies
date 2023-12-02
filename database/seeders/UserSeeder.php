<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Sarmad Ahmed Khalil";
        $user->email = "sarmadkhalil97@gmail.com";
        $user->email_verified_at = now();
        $user->password = bcrypt('password');
        $user->remember_token = "asfasfawetwrtwaetasgadg";
        $user->save();
    }
}
