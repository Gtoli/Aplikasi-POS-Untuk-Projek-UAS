<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{

// Akun Kasir Default Anda [cite: 30, 31, 32, 33]
    \App\Models\User::factory()->create([
        'name' => 'Kasir',
        'email' => 'kasir@toko.com',
        'password' => bcrypt('password'),
    ]);

    // Memanggil seeder produk otomatis
    $this->call(ProductSeeder::class);
}
}
