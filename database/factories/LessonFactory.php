<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'platform' => 2, // assuming 1 is for local videos
            'video_original_name' => 'https://youtu.be/9taAy5x0Dw8?si=hjuxopEvu05ha6-E',
            'video_path' => '9taAy5x0Dw8',
            'image_path' => 'https://img.youtube.com/vi/9taAy5x0Dw8/0.jpg',
            'description' => $this->faker->paragraph(),
            'duration' => 129, // example duration in seconds
            'is_processed' => 1
        ];
    }
}