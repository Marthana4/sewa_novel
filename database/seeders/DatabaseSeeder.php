<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama' => 'Martha',
            'no_hp' => '085606901022',
            'email' => 'admin@sewanovel.id',
            'username' => 'Administrator',
            'password' => Hash::make('admin123'), 
            'role' => 'admin',
        ]);
    }
}
