<?php

namespace Database\Seeders;

use App\Models\Permisson;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['name' => 'super-admin', 'display_name' => 'Super Admin', 'group' => 'system'],
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],
            ['name' => 'employee', 'display_name' => 'Employee', 'group' => 'system'],
            ['name' => 'manager', 'display_name' => 'Manager', 'group' => 'system'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }


        $superAdmin = User::whereEmail('admin@gmail.com')->orWhere("email","hahaiviet2411@gmail.com")->first();

        if(!$superAdmin)
        {
            $superAdmin = User::factory()->create(['email' => 'admin@gmail.com']);
        }
        $superAdmin->assignRole('super-admin');


        $premissions = [
            ['name' => 'create-user', 'display_name' => 'Create User', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update User', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Deleter User', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create Role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Deleter Role', 'group' => 'Role'],

            ['name' => 'create-category', 'display_name' => 'Create category', 'group' => 'category'],
            ['name' => 'update-category', 'display_name' => 'Update category', 'group' => 'category'],
            ['name' => 'show-category', 'display_name' => 'Show category', 'group' => 'category'],
            ['name' => 'delete-category', 'display_name' => 'Deleter category', 'group' => 'category'],
            
            ['name' => 'create-product', 'display_name' => 'Create product', 'group' => 'product'],
            ['name' => 'update-product', 'display_name' => 'Update product', 'group' => 'product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'product'],
            ['name' => 'delete-product', 'display_name' => 'Deleter product', 'group' => 'product'],

            ['name' => 'create-coupon', 'display_name' => 'Create coupon', 'group' => 'coupon'],
            ['name' => 'update-coupon', 'display_name' => 'Update coupon', 'group' => 'coupon'],
            ['name' => 'show-coupon', 'display_name' => 'Show coupon', 'group' => 'coupon'],
            ['name' => 'delete-coupon', 'display_name' => 'Deleter coupon', 'group' => 'coupon'],

            ['name' => 'list-order', 'display_name' => 'list order', 'group' => 'orders'],
            ['name' => 'update-order-status', 'display_name' => 'Update order status', 'group' => 'orders'],
        ];

        foreach ($premissions as $item) {
            Permisson::updateOrCreate($item);
        }
    }
}