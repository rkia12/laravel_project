<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Classe;

class Class_etudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $etudiants = User::all();
        $classes = Classe::all();

        return [
            'fichier_scol'=>$this->faker->text(),
            'id_classe' =>  $classes->random()->id,
            'id_etudiant' => $etudiants->random()->id,
        ];
    }
}
