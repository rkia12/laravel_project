<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Ecole;

class ClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ecole_ids = Ecole::all();

        return [
            'nomClasse' => $this->faker->company(),
            'id_ecole' =>$ecole_ids->random()->id,
        ];
    }
}
