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
        $admin = Role::create(['name' => 'admin']);
        $customer = Role::create(['name' => 'customer']);
        $shopOwner = Role::create(['name' => 'shop_owner']);
        $driver = Role::create(['name' => 'driver']);

        $permissions = [
            'manage_roles',
            'manage_users',
            'create_orders',
            'view_orders',
            'update_orders',
            'delete_orders',
            'approve_orders',
            'reject_orders',
            'deliver_orders'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
        $customer->givePermissionTo(['create_orders', 'view_orders']);
        $shopOwner->givePermissionTo(['view_orders']);
        $driver->givePermissionTo(['view_orders', 'approve_orders', 'reject_orders', 'deliver_orders']);
    }
}
