<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat Kategori default jika belum ada
        $bookCategory = Category::firstOrCreate(['name' => 'Book']);
        $sportCategory = Category::firstOrCreate(['name' => 'Sepeda']);
        $foodCategory = Category::firstOrCreate(['name' => 'Makanan']);

        // 2. Membuat Data Barang Otomatis (Random Bawaan)
        Product::firstOrCreate([
            'category_id' => $bookCategory->id,
            'name' => 'How To Survive',
            'price' => 150,
            'stock' => 5
        ]);

        Product::firstOrCreate([
            'category_id' => $bookCategory->id,
            'name' => 'Laravel for Beginners',
            'price' => 250,
            'stock' => 12
        ]);

        Product::firstOrCreate([
            'category_id' => $sportCategory->id,
            'name' => 'Sepeda Gunung Polygon',
            'price' => 1500,
            'stock' => 3
        ]);

        Product::firstOrCreate([
            'category_id' => $foodCategory->id,
            'name' => 'Roti Cokelat',
            'price' => 15,
            'stock' => 50
        ]);
    }
}