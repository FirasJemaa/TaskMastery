<?php

namespace Database\Factories;

use App\Models\Couleur;
use App\Models\Etiquette;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Projet;
use App\Models\Statut;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->word,
            'designation' => $this->faker->sentence,
            'etat' => $this->faker->numberBetween(0, 1),
            'id_projet' => Projet::factory(),
            'id_couleur' => Couleur::factory(),
            'id_etiquette' => Etiquette::factory(),
            'id_statut' => Statut::factory(),
        ];
    }
}
