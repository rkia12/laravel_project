<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Classe;


class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $classe_ids = Classe::all();

        return [
            "fichier_scol"=>$this->faker->name(),
            'nom_matiere' => $this->faker->company(),
            'id_classe' =>$classe_ids->random()->id,
        ];
    }
}
