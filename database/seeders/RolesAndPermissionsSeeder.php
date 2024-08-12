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
            'user.create' => 'Create User',
            'user.update' => 'Update User',
            'user.delete' => 'Delete User',
            'role.create' => 'Create Role',
            'role.update' => 'Update Role',
            'role.delete' => 'Delete Role',
            'product.create' => 'Create Product',
            'product.update' => 'Update Product',
            'product.delete' => 'Delete Product',
            'category.create' => 'Create Category',
            'category.update' => 'Update Category',
            'category.delete' => 'Delete Category',
            'voucher.create'  => 'Create Voucher',
            'voucher.update' => 'Update Voucher',
            'voucher.delete' => 'Delete Voucher',
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
