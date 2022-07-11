<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Planet;
use App\Models\Species;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CharacterFactory extends Factory
{
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'homeWorldId' => Planet::factory()->create()->id,
            'speciesId' => Species::factory()->create()->id,
        ];
    }
}
