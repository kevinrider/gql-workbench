<?php

namespace Database\Factories;

use App\Models\Planet;
use App\Models\Species;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class SpeciesFactory extends Factory
{
    protected $model = Species::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lifespan' => rand(1, 200),
            'originPlanetId' => Planet::factory()->create()->id,
        ];
    }
}
