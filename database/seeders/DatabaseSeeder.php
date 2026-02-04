<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            SiswaSeeder::class,
            PetugasSeeder::class,
            PenerbitSeeder::class,
            PenulisSeeder::class,
            BukuSeeder::class,
        ]);

        // Hapus bagian ini kalau gak perlu
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}