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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ahmad Dani Maulana',
            'email' => 'ahmaddani@example.com',
            'nim' => '2041720052',
            'prodi' => 'Teknik Informatika',
            'tanggal_buat' => "2024-07-09"
        ]);
    }
}
