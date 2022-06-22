<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'name' => 'Configurasi',
            'guard_name' => 'admin',
            'parent_menu' => '0'
        ]);
        $menu = Menu::create([
            'name' => 'Configurasi',
            'guard_name' => 'admin',
            'parent_menu' => '0'
        ]);
    }
}
