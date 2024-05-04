<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);
        /* \App\Models\User::factory(1)->create(); */

        /* \App\Models\User::factory()->create([
            'name' => 'admin',
            'last_name' => 'admin',
            'cellphone' => '12345678',
            'email' => 'admin@example.com',
            'password' => bcrypt('1234567'),
        ]); */
    }
}
