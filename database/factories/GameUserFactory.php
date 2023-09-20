<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Game;
use App\Models\GameUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\GameUser>
 */
final class GameUserFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = GameUser::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'game_id'=> Game::class::inRandomOrder()->first()->id,
            'user_id'=> User::class::inRandomOrder()->first()->id
        ];
        /*
        return [
            'game_id' => fake()->randomNumber(),
            'user_id' => fake()->randomNumber(),
        ];
        */
    }
}
