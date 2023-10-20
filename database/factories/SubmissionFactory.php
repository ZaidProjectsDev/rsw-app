<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Configuration;
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
            'user_id'=> fake()->randomNumber(),
            'game_id' => fake()->randomNumber(),
            'hardware_configuration_id'=> Configuration::inRandomOrder()->first(),
            'description' => fake()->text,
        ];
    }
}
