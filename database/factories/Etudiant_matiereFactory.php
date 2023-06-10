<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Matiere;

class Etudiant_matiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $etudiants = User::all();
        $matieres = Matiere::all();

        return [
            'id_etudiant' =>  $etudiants->random()->id,
            'id_matiere' => $matieres->random()->id,
        ];
    }
}
