<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutorial>
 */
class TutorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topic' => fake()->text(50),
            'body' => fake()->text(3000),
            'slug' => fake()->slug(),
            'tags' => fake()->text(),
            'banner' => fake()->imageUrl(),
            // 'author_id' => User::factory()->create()->id,
            'author_id' => User::find('99a672f6-b236-4be4-95e4-a707158461e0')->id,
        ];
    }
}
