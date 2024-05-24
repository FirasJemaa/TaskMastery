<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribution>
 */
class AttributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_tache' => $this->faker->randomDigitNotNull,
            'id_inviter' => $this->faker->randomDigitNotNull,
            'id_utilisateur' => $this->faker->randomDigitNotNull,
            'createur' => 1,
        ];
    }
}
