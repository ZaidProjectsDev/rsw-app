<?php

namespace Database\Factories;

use App\Models\HardwarePart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserHardwareConfiguration;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHardwareConfiguration>
 */
class UserHardwareConfigurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = UserHardwareConfiguration::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id'=> User::inRandomOrder()->first()->id,
            'hardware_part_id'=> HardwarePart::inRandomOrder()->first()->id,
        ];
    }
}
