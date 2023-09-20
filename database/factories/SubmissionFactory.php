<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Submission>
 */
final class SubmissionFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Submission::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'gameId' => fake()->randomNumber(),
            'hardwareId' => fake()->word,
            'description' => fake()->text,
        ];
    }
}
