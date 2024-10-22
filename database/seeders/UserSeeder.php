<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i=1; $i <= 10 ; $i++) { 
            User::factory()->create([
                'name' => "User {$i}",
                'email' => "user{$i}@example.com",
                'password' => Hash::make('password'), // Encrypt password
            ]);
        }
        // User::factory(10)->create([
            
        //     'password' => Hash::make('password'), // Encrypt password
        // ]);
    }
}
