<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user.index' => 'View Users',
            'user.create' => 'Create User',
            'user.update' => 'Update User',
            'user.delete' => 'Delete User',
            'role.index' => 'View Roles',
            'role.create' => 'Create Role',
            'role.update' => 'Update Role',
            'role.delete' => 'Delete Role',
            'product.index' => 'View Products',
            'product.create' => 'Create Product',
            'product.update' => 'Update Product',
            'product.delete' => 'Delete Product',
            'category.index' => 'View Categories',
            'category.create' => 'Create Category',
            'category.update' => 'Update Category',
            'category.delete' => 'Delete Category',
            'voucher.index' => 'View Vouchers',
            'voucher.create'  => 'Create Voucher',
            'voucher.update' => 'Update Voucher',
            'voucher.delete' => 'Delete Voucher',
            'order.index' => 'View Orders',
            'servers.index' => 'View Servers',
            'servers.create' => 'Create Server',
            'servers.update' => 'Update Server',
            'servers.delete' => 'Delete Server',
            'api_key.create' => 'Create API Key',
            'api_key.update' => 'Update API Key',
            'setting.update' => 'Update Setting',
        ];

        foreach ($permissions as $name => $description) {
            Permission::create([
                'name' => $name,
                'description' => $description,
            ]);
        }

        $role = Role::create(['name' => 'admin', 'display_name' => 'Admin']);
        $role->givePermissionTo(array_keys($permissions));
    }
}
