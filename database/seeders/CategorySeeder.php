<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['nama_kategori' => 'Perang']);
        Category::create(['nama_kategori' => 'Hiburan']);
        Category::create(['nama_kategori' => 'Makanan']);
        Category::create(['nama_kategori' => 'Politik']);
        Category::create(['nama_kategori' => 'AI']);
        Category::create(['nama_kategori' => 'Teknologi']);
        Category::create(['nama_kategori' => 'Artis']);
        Category::create(['nama_kategori' => 'Permainan']);
        Category::create(['nama_kategori' => 'Bola']);
        Category::create(['nama_kategori' => 'E Sport']);
    }
}
