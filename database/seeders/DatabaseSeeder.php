<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\Ville;
// use App\Models\Ecole;
// use App\Models\Classe;
// use App\Models\Matiere;
// use App\Models\User;
// use App\Models\Etudiant_matiere;
// use App\Models\Categorie;
// use App\Models\Produit;
use App\Models\Order;
use App\Models\Ordre_produit;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Ville::factory(6)->create();
        // Ecole::factory(6)->create();
        // Classe::factory(18)->create();
        // Matiere::factory(18)->create();
        // Categorie::factory(6)->create(); // creating of parent categories
        // DB::table("packs")->insert(
        //     [
        //         [
        //             'type' => 'Pack Rentree \n(Fournitures+Livres)'
        //         ],
        //         [
        //             'type' => 'Pack Livres'
        //         ]
        //         ,
        //         [
        //             'type' => 'Pack Fournitures'
        //         ]
        //     ]
        // );
        // * creating of sub categories
        // Categorie::factory(16)->create();
        // Produit::factory(80)->create();
        // Order::factory(30)->create();
        Ordre_produit::factory(30)->create();
        
    }
}
