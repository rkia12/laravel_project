<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Produit;
use App\Models\Order;

class Ordre_produitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $produits = Produit::all();
        $orders = Order::all();
        return [
            'id_ordre' => $orders->random()->id,
            'id_produit' => $produits->random()->id,
            'quantite' => $this->faker->randomFloat(null, 1, 30),
        ];
    }
}
