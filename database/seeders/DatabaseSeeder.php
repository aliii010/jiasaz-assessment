<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ali',
            'email' => 'alimajeed8110@gmail.com',
            'password' => bcrypt('ali123456')
        ]);

        $user->assignRole('admin');
    }
}
