<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('categories')->insert(
        //     [
        //         [
        //             'nom' => 'parent categorie 1',
        //             'id_subCat' => 1,
        //         ],
        //         [
        //             'nom' => 'parent categorie 2',
        //             'id_subCat' => 2,
        //         ],
        //         [
        //             'nom' => 'parent categorie 3',
        //             'id_subCat' => 3,
        //         ],
        //         [
        //             'nom' => 'sub categorie 1',
        //             'id_subCat' => 1,
        //         ],
        //         [
        //             'nom' => 'sub categorie 2',
        //             'id_subCat' => 2,
        //         ],
        //     ]
        // );

        //Fake Data
        // Categorie::factory()
        //     ->count(20)
        //     ->create();

    }
}
