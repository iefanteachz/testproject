<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    user::create([

            'id'=> '1',
            'name' => 'user1',
            'email' => '1@1.com',
            'password' => 'pass1234',

            ]);
    }
}
