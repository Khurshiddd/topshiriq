<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();
        User::create([
            'name'=>'Admin',
            'email'=>'admin@ecom.uz',
            'password'=>Hash::make('secret123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
