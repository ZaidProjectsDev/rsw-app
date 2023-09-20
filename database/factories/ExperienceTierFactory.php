<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ExperienceTier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ExperienceTier>
 */
final class ExperienceTierFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = ExperienceTier::class;

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
