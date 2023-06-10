<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AnalyticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['isAdmin'])->prefix('categories')->group(function () {

    Route::get("/", [CategorieController::class, 'index'])->name("categories");
    Route::delete("/delete/{id}", [CategorieController::class, 'distroy'])->name("category.delete");
    Route::get("/add", [CategorieController::class, 'add'])->name("category.add");
    Route::post("/store", [CategorieController::class, 'store'])->name("category.store");
    Route::get("/edit/{id}", [CategorieController::class, 'edit'])->name("category.edit");
    Route::post("/update/{id}", [CategorieController::class, 'update'])->name("category.update");
    
});

Route::middleware(['isAdmin'])->prefix('ecoles')->group(function () {

    Route::get("/", [EcoleController::class, 'index'])->name("ecoles");
    Route::delete("/delete/{id}", [EcoleController::class, 'distroy'])->name("ecole.delete");
    Route::get("/add", [EcoleController::class, 'add'])->name("ecole.add");
    Route::post("/store", [EcoleController::class, 'store'])->name("ecole.store");
    Route::get("/edit/{id}", [EcoleController::class, 'edit'])->name("ecole.edit");
    Route::post("/update/{id}", [EcoleController::class, 'update'])->name("ecole.update");

});


Route::middleware(['isAdmin'])->prefix('classes')->group(function () {

    Route::get("/", [ClasseController::class, 'index'])->name("classes");
    Route::delete("/delete/{id}", [ClasseController::class, 'distroy'])->name("classe.delete");
    Route::get("/add", [ClasseController::class, 'add'])->name("classe.add");
    Route::post("/store", [ClasseController::class, 'store'])->name("classe.store");
    Route::get("/edit/{id}", [ClasseController::class, 'edit'])->name("classe.edit");
    Route::post("/update/{id}", [ClasseController::class, 'update'])->name("classe.update");

});

Route::middleware(['isAdmin'])->prefix('villes')->group(function () {

    Route::get("/", [VilleController::class, 'index'])->name("villes");
    Route::delete("/delete/{id}", [VilleController::class, 'distroy'])->name("ville.delete");
    Route::get("/add", [VilleController::class, 'add'])->name("ville.add");
    Route::post("/store", [VilleController::class, 'store'])->name("ville.store");
    Route::get("/edit/{id}", [VilleController::class, 'edit'])->name("ville.edit");
    Route::post("/update/{id}", [VilleController::class, 'update'])->name("ville.update");
});

Route::middleware(['isAdmin'])->prefix('matieres')->group(function () {

    Route::get("/", [MatiereController::class, 'index'])->name("matieres");
    Route::delete("/delete/{id}", [MatiereController::class, 'distroy'])->name("matiere.delete");
    Route::get("/add", [MatiereController::class, 'add'])->name("matiere.add");
    Route::post("/store", [MatiereController::class, 'store'])->name("matiere.store");
    Route::get("/edit/{id}", [MatiereController::class, 'edit'])->name("matiere.edit");
    Route::post("/update/{id}", [MatiereController::class, 'update'])->name("matiere.update");
});

Route::middleware(['isAdmin'])->prefix('packs')->group(function () {

    Route::get("/", [PackController::class, 'index'])->name("packs");
    Route::delete("/delete/{id}", [PackController::class, 'distroy'])->name("pack.delete");
    Route::get("/add", [PackController::class, 'add'])->name("pack.add");
    Route::post("/store", [PackController::class, 'store'])->name("pack.store");
    Route::get("/edit/{id}", [PackController::class, 'edit'])->name("pack.edit");
    Route::post("/update/{id}", [PackController::class, 'update'])->name("pack.update");

});

Route::middleware(['isAdmin'])->prefix('produits')->group(function () {

    Route::get("/", [ProduitController::class, 'index'])->name("produits");
    Route::delete("/delete/{id}", [ProduitController::class, 'distroy'])->name("produit.delete");
    Route::get("/add", [ProduitController::class, 'add'])->name("produit.add");
    Route::post("/store", [ProduitController::class, 'store'])->name("produit.store");
    Route::get("/edit/{id}", [ProduitController::class, 'edit'])->name("produit.edit");
    Route::post("/update/{id}", [ProduitController::class, 'update'])->name("produit.update");

});


Route::middleware(['isAdmin'])->prefix('etudiants')->group(function () {

    Route::get("/", [UserController::class, 'index'])->name("etudiants");
    Route::delete("/delete/{id}", [UserController::class, 'distroy'])->name("etudiant.delete");
    Route::get("/add", [UserController::class, 'add'])->name("etudiant.add");
    Route::post("/store", [UserController::class, 'store'])->name("etudiant.store");
    Route::get("/edit/{id}", [UserController::class, 'edit'])->name("etudiant.edit");
    Route::post("/update/{id}", [UserController::class, 'update'])->name("etudiant.update");

});

Route::middleware(['isAdmin'])->prefix('administrateurs')->group(function () {

    Route::get("/", [UserController::class, 'index_admin'])->name("administrateurs");
    Route::delete("/delete/{id}", [UserController::class, 'distroy_admin'])->name("administrateur.delete");
    Route::get("/add", [UserController::class, 'add_admin'])->name("administrateur.add");
    Route::post("/store", [UserController::class, 'store_admin'])->name("administrateur.store");
    Route::get("/edit/{id}", [UserController::class, 'edit_admin'])->name("administrateur.edit");
    Route::post("/update/{id}", [UserController::class, 'update_admin'])->name("administrateur.update");
});


Route::middleware(['isAdmin'])->prefix('ordres')->group(function () {

    Route::get("/", [OrderController::class, 'index'])->name("ordres");
    Route::delete("/delete/{id}", [OrderController::class, 'distroy'])->name("ordre.delete");
    Route::get("/edit/{id}", [OrderController::class, 'edit'])->name("ordre.edit");
    Route::post("/update/{id}", [OrderController::class, 'update'])->name("ordre.update");
    Route::get("/viewOrdre/{id}",[OrderController::class,'viewCommande'])->name("ordre.viewOrdre");
});


Route::middleware(['isAdmin'])->prefix('analytic')->group(function () {

    Route::get('/perMonths/{year}', [AnalyticsController::class, 'commandesPerYear'])->name('analytics.perMonths');
    Route::get("/produitssAnalytics", [AnalyticsController::class, 'produitssAnalytics'])->name('analytics.produitssAnalytics');
});



Route::middleware(['isAdmin'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
