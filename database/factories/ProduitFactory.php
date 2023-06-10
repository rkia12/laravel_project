<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Categorie;
use App\Models\Pack;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Categorie::all();
        $packs = Pack::all();

        $quantites = array(1,2,3,4,5,6,7,8,9,10,11,22,13,12,14,24,70,50,21,52,61);
        $colors = array('jaune','Gris','blanc','noir','bleu','orange','vert','rouge');
        $sizes = array('sm','md','xl','xxl','xxxl','xs');

        return [
            'nom'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'prix'=>$this->faker->randomFloat(null, 3, 160),
            'photo'=>$this->faker->imageUrl(200, 200),
            'size' =>   $sizes[array_rand($sizes)],
            'couleur' => $colors[array_rand($colors)],
            'quantite' =>$quantites[array_rand($quantites)],
            'id_categorie' => $categories->random()->id,
            'id_pack' => $packs->random()->id,
        ];
    }
}
