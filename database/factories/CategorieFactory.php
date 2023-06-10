<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\Matiere;
use \App\Models\Categorie;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $cats = array(12,22);
        $matieres = Matiere::all();
        $categories = Categorie::all();

        return [
            'nom' => $this->faker->name(),
            'id_matiere' => $matieres->random()->id,
            'id_subCategorie' => $categories->random()->id,
        ];

    }
}
