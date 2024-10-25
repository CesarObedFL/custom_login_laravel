<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'phone' => 1122334455,
            'password' => Hash::make('secret') ,
            'rfc' => 'FILC900528TR1',
            'notes' => 'test 1: tests notes',
        ]);

        User::factory(10)->create();
    }
}
