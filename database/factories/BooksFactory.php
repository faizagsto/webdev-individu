<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Fetch a random category or create one if none exists
        $category = Category::inRandomOrder()->first();

        if (!$category) {
            $category = Category::factory()->create(); // Create a default category
        }

        return [
            'isbn' => fake()->isbn13(),
            'title' => fake()->sentence(4),
            'author' => fake()->name(),
            'category_id' => $category->id, // Assign the category id
        ];
    }
}

