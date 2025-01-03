<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $permissions = [
        //     'approve_orders',
        //     'reject_orders',
        //     'deliver_orders',
        // ];

        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        $admin = Role::where('name', 'admin')->first();
        $shopOwner = Role::where('name', 'shop_owner')->first();
        $driver = Role::where('name', 'driver')->first();

        $admin->givePermissionTo(Permission::all());
        $shopOwner->givePermissionTo(['approve_orders', 'reject_orders']);
        $driver->givePermissionTo('deliver_orders');
    }
}
