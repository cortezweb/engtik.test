<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\level;
use App\Models\price;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'status' => 3, // Assuming 3 represents 'published'
            'summary' => $this->faker->paragraph,
            'image_path' => 'courses/images/' . $this->faker->image('public\storage\courses\images', 640, 480, null, false),
            'user_id' => 1, // Assuming user with ID 1 exists
            'level_id' => level::all()->random()->id, // Assuming level with ID 1 exists
            'category_id' =>  category::all()->random()->id, // Assuming category with ID 1 exists
            'price_id' => price::all()->random()->id, // Assuming price with ID 1 exists


        ];
    }
}