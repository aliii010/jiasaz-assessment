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
        // $user = User::find(3);
        // $user->assignRole('admin');



        // \App\Models\User::factory(10)->create();


        // \App\Models\Product::factory(10)->create();


        // \App\Models\Category::create([
        //     'name' => 'Electronics',
        //     'shop_id' => 61,
        //     'updated_at' => now(),
        //     'created_at' => now(),
        // ]);
        // \App\Models\Category::create([
        //     'name' => 'Clothing',
        //     'shop_id' => 62,
        //     'updated_at' => now(),
        //     'created_at' => now(),
        // ]);
        // \App\Models\Category::create([
        //     'name' => 'Furniture',
        //     'shop_id' => 61,
        //     'updated_at' => now(),
        //     'created_at' => now(),
        // ]);


        \App\Models\OrderStatus::create([
            'name' => 'pending',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        \App\Models\OrderStatus::create([
            'name' => 'approved',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        \App\Models\OrderStatus::create([
            'name' => 'rejected',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        \App\Models\OrderStatus::create([
            'name' => 'delivered',
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }
}
