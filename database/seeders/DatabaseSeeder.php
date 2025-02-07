<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\ShopSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ShopOwnerSeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            AdminUserSeeder::class,
            ShopOwnerSeeder::class,
            ShopSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
