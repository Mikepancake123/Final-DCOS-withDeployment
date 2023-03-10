<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminpass'),
            'email_verified_at' => now()
        ]);
    }
}
