<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin',
            'login' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('adminWSR'),
            'is_admin' => true,
        ]);
    }
}
