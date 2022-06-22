<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create(
            [
                'name' => 'Configurasi',
                'guard_name' => 'admin',
                'parent_menu' => '0'
            ],[
                'name' => 'Roles',
                'guard_name' => 'admin',
                'parent_menu' => '1'
            ],[
                'name' => 'Menu',
                'guard_name' => 'admin',
                'parent_menu' => '1'
            ],[
                'name' => 'Permissions',
                'guard_name' => 'admin',
                'parent_menu' => '1'
            ],[
                'name' => 'View Roles',
                'guard_name' => 'admin',
                'parent_menu' => '2'
            ],[
                'name' => 'Store Roles',
                'guard_name' => 'admin',
                'parent_menu' => '2'
            ],[
                'name' => 'Edit Roles',
                'guard_name' => 'admin',
                'parent_menu' => '2'
            ],[
                'name' => 'Delete Roles',
                'guard_name' => 'admin',
                'parent_menu' => '2'
            ],[
                'name' => 'View Menu',
                'guard_name' => 'admin',
                'parent_menu' => '3'
            ],[
                'name' => 'Store Menu',
                'guard_name' => 'admin',
                'parent_menu' => '3'
            ],[
                'name' => 'Edit Menu',
                'guard_name' => 'admin',
                'parent_menu' => '3'
            ],[
                'name' => 'Delete Menu',
                'guard_name' => 'admin',
                'parent_menu' => '3'
            ],[
                'name' => 'View Permissions',
                'guard_name' => 'admin',
                'parent_menu' => '4'
            ],[
                'name' => 'Store Permissions',
                'guard_name' => 'admin',
                'parent_menu' => '4'
            ],[
                'name' => 'Edit Permissions',
                'guard_name' => 'admin',
                'parent_menu' => '4'
            ],[
                'name' => 'Delete Permissions',
                'guard_name' => 'admin',
                'parent_menu' => '4'
            ],[
                'name' => 'Configurasi Article',
                'guard_name' => 'admin',
                'parent_menu' => '0'
            ],[
                'name' => 'Category',
                'guard_name' => 'admin',
                'parent_menu' => '17'
            ],[
                'name' => 'Tag',
                'guard_name' => 'admin',
                'parent_menu' => '17'
            ],[
                'name' => 'Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '0'
            ],[
                'name' => 'View Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '28'
            ],[
                'name' => 'Store Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '28'
            ],[
                'name' => 'Edit Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '28'
            ],[
                'name' => 'Delete Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '28'
            ],[
                'name' => 'Approved Create Article',
                'guard_name' => 'admin',
                'parent_menu' => '28'
            ],[
                'name' => 'Frontend',
                'guard_name' => 'admin',
                'parent_menu' => '0'
            ],[
                'name' => 'Caroseul',
                'guard_name' => 'admin',
                'parent_menu' => '34'
            ],[
                'name' => 'View Caroseul',
                'guard_name' => 'admin',
                'parent_menu' => '35'
            ],[
                'name' => 'Store Caroseul',
                'guard_name' => 'admin',
                'parent_menu' => '35'
            ],[
                'name' => 'Edit Caroseul',
                'guard_name' => 'admin',
                'parent_menu' => '35'
            ],[
                'name' => 'Delete Caroseul',
                'guard_name' => 'admin',
                'parent_menu' => '35'
            ],[
                'name' => 'Users',
                'guard_name' => 'admin',
                'parent_menu' => '1'
            ],[
                'name' => 'View Users',
                'guard_name' => 'admin',
                'parent_menu' => '40'
            ],[
                'name' => 'View Users',
                'guard_name' => 'admin',
                'parent_menu' => '40'
            ],[
                'name' => 'View Users',
                'guard_name' => 'admin',
                'parent_menu' => '40'
            ],[
                'name' => 'View Users',
                'guard_name' => 'admin',
                'parent_menu' => '40'
            ]
        );
    }
}
