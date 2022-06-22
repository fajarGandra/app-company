<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin Ganteng',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        // $user = User::whereName('Admin Ganteng')->first();

        $admin->assignRole('admin');
    }
}
