<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;


class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $utilisateurs = User::all();

        return [
            'id_utilisateur' => $utilisateurs->random()->id,
            'prix_total'=>$this->faker->randomFloat(null, 10, 500),
        ];
    }
}
