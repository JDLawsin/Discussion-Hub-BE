<?php

namespace Database\Factories;

use App\Models\User;
use Database\Factories\Providers\MeaningfulDataProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Protocol>
 */
class ProtocolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new MeaningfulDataProvider($this->faker));

        return [
            'user_id' => User::factory(),
            'title'   => $this->faker->protocolTitle(),
            'content' => $this->faker->protocolContent(),
        ];
    }
}
