<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\PmaDesignerSettings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PmaDesignerSettings>
 */
final class PmaDesignerSettingsFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = PmaDesignerSettings::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
        ];
    }
}
