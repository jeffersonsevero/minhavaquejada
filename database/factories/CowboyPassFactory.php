<?php

namespace Database\Factories;

use App\Models\Cowboy;
use App\Models\Pass;
use App\Models\Representation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CowboyPass>
 */
class CowboyPassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cowboy_id' => Cowboy::factory(),
            'pass_id' => Pass::factory(),
            'helper_id' => Cowboy::factory(),
            'representation_id' => Representation::factory(),
            'horse' => fake()->name,
        ];
    }
}
