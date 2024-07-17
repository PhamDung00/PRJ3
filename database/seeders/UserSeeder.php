<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        User::create([
            'name' => "Lokey",
            'email' => "hahaiviet2411@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("dcmvcl123"), // password
            'remember_token' => Str::random(20),
            'img' => $faker->imageUrl('https://picsum.photos/'),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            "role_id"=>1,
            'gender' => 'male'
        ]);
    }
}