<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategorieController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProduitController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// categories
// get all categories
Route::get("/categories", [CategorieController::class, "getAllCategories"]);
// get one category by id
Route::get("/categorie/{id}", [CategorieController::class, "show"]);


// villes
// get all cities
Route::get("/getAllCities", [VilleController::class, "getAllCities"]);

// get cities by name
Route::get("/getCityByName/{nom}", [VilleController::class, "getCityByName"]);

// Utilisateurs
// get user by city id
Route::get("/getUserByCityId/{id_ville}", [UserController::class, "getUserByCityId"]);


// ecoles
// get all schools
Route::get("/getAllSchools",[EcoleController::class,"getAllSchools"]);

// get schols by city id
Route::get("/getSchoolByCityId/{id_ville}",[EcoleController::class,"getSchoolByCityId"]);


// classes
// get all classes
Route::get("/getAllClasses",[ClasseController::class,"getAllClasses"]);

// get classe by school id
Route::get("/getClassesBySchoolId/{id_ecole}",[ClasseController::class,"getClassesBySchoolId"]);


// matieres
// get all materials
Route::get("/getAllMaterials",[MatiereController::class,"getAllMaterials"]);
// get material by class id
Route::get("/getMatieresByClasseId/{id_classe}",[MatiereController::class,"getMatieresByClasseId"]);


// categories
// get all categories
Route::get("/getAllCategories",[CategorieController::class,"getAllCategories"]);
// get material by class id
Route::get("/getCategoriesByMatiereId/{id_matiere}",[CategorieController::class,"getCategoriesByMatiereId"]);
// get sub categories of a given category id
Route::get("/getCategoriesOfCatId/{id_categorie}",[CategorieController::class,"getCategoriesOfCatId"]);



// produits
// get all products
Route::get("/getAllProducts",[ProduitController::class,"getAllProducts"]);


// get produits by categorie id ( example cartable)
Route::get("/getProductsByCatId/{id_categorie}",[ProduitController::class,"getProductsByCatId"]);

// get produits by pack id ( example livres)
Route::get("/getProductsByPackId/{id_pack}",[ProduitController::class,"getProductsByPackId"]);


// get produits by categorie and pack id ( example livres)
Route::get("/getProductsByPackIdAndCatId/{id_categorie}/{id_pack}",[ProduitController::class,"getProductsByPackIdAndCatId"]);


// get produits tby material ( example of material : math , fransh , italy ,...)
Route::get("/getProductsByMatiere/{id_matiere}",[ProduitController::class,"getProductsByMatiere"]);


