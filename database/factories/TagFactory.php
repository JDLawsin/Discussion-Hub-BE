<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = [
            'laravel', 'api', 'rest', 'database', 'php',
            'javascript', 'nextjs', 'tailwind', 'postgresql',
            'typesense', 'authentication', 'security', 'testing',
            'deployment', 'docker', 'redis', 'queue', 'cache'
        ];

        return [
            'name' => fake()->unique()->randomElement($tags),
        ];
    }
}
