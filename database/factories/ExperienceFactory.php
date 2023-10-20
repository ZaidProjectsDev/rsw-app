<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Experience>
 */
final class ExperienceFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Experience::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'ranking' => fake()->randomNumber(),
        ];
    }
}
