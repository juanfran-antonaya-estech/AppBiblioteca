<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'release_year' => $this->faker->numberBetween(1900, Carbon::now()->year),
            'status' => false,

            'author_id' => Author::factory(),
        ];
    }
}
