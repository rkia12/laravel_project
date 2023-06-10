<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Ville;

class EcoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_villes = Ville::all();

        return [
            'nom' =>   $this->faker->company(),
            'id_ville' => $id_villes->random()->id,
        ];
    }
}
