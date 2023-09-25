<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HardwarePart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\HardwarePart>
 */
final class HardwarePartFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = HardwarePart::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'hardware_type_id' => fake()->randomNumber(),
            'vendor_id' => fake()->word,
        ];
    }
}
