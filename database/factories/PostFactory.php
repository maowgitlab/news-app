<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = 'Berita Ke-' . fake()->unique()->numberBetween(1, 100);
        return [
            'diupload_oleh' => User::inRandomOrder()->first(),
            'judul' => $judul,
            'slug'  => Str::slug($judul),
            'konten' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate quidem nobis placeat numquam consequuntur nesciunt odit blanditiis natus molestiae dolore, voluptatem, doloremque nisi maxime nostrum error alias veritatis necessitatibus fugit.'
        ];
    }
}
