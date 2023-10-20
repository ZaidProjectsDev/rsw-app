<?php

namespace Database\Factories;

use App\Models\Part;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Configuration;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Configuration>
 */
class ConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Configuration::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id'=> User::inRandomOrder()->first()->id,
        ];
    }
}
