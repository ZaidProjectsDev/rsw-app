<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Setting>
 */
final class SettingFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Setting::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'value' => fake()->word,
            'value_number' => fake()->randomNumber(),
        ];
    }
}
