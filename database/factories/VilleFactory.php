<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $villes = array(
            'Agadir', 'Beni Mellal', 'Boujdour',
            'Casablanca', 'Chefchaouen', 'Dakhla ', 'El Jadida', 'Essaouira ', 'Fès', 'Guelmim',
            'Laâyoune', 'Marrakech', 'Martil', 'Nador', 'Ouarzazate', 'Rabat', 'Safi ', 'Settat', 'Zagora'
        );

        return [
            'nomVille' =>  $villes[array_rand($villes)],
        ];
    }
}
