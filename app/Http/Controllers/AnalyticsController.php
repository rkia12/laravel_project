<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function commandesPerYear($year = null)
    {
        if ($year == null || $year == "" || $year == "null") $year = Carbon::today()->year;
        $commandes = Order::whereYear('created_at', '=', $year)
            ->orderBy('created_at', 'asc')->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('m');
            });

        $data = [];
        $available_m = [];
        $available_data = [];
        $months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
        foreach ($commandes as $key => $value) {
            array_push($available_m, $months[$key - 1]);
            array_push($available_data, count($value));
        }
        array_push($data, array("months" => $available_m, "nbres" => $available_data));
        return response()->json($data[0]);
    }

    public function produitssAnalytics()
    {

        $categories = $this->getCatsAnalytics();
        $packs = $this->getPacksAnalytics();
        $ecoles = $this->getEcolesAnalytics();
        $classes = $this->getClassesAnalytics();

        return response()->json(array(
            "categories" => $categories,
            "packs" => $packs,
            "ecoles" => $ecoles,
            "classes" => $classes
        ));
    }

    private function getCatsAnalytics()
    {

        $produits = DB::table("produits")
            ->join("categories", "produits.id_categorie", "=", "categories.id")
            ->select("categories.nom as name", DB::raw('COUNT(id_categorie) as value'))
            ->orderBy('value', 'desc')
            ->groupBy("name")->take(6)->get();

        return $produits;
    }
    private function getPacksAnalytics()
    {
        $produits = DB::table("produits")
            ->join("packs", "produits.id_pack", "=", "packs.id")
            ->select("packs.type as name", DB::raw('COUNT(id_pack) as value'))
            ->orderBy('value', 'desc')
            ->groupBy("name")->take(5)->get();

        return $produits;
    }

    private function getEcolesAnalytics()
    {

        $produits = DB::table("produits")
            ->join("categories", "produits.id_categorie", "=", "categories.id")
            ->join("matieres", "categories.id_matiere", "=", "matieres.id")
            ->join("classes", "matieres.id_classe", "=", "classes.id")
            ->join("ecoles", "classes.id_ecole", "=", "ecoles.id")
            ->select("ecoles.nom as name", DB::raw('COUNT(id_ecole) as value'))
            ->orderBy('value', 'desc')
            ->groupBy("name")->take(6)->get();

        return $produits;
    }

    private function getClassesAnalytics()
    {

        $produits = DB::table("produits")
            ->join("categories", "produits.id_categorie", "=", "categories.id")
            ->join("matieres", "categories.id_matiere", "=", "matieres.id")
            ->join("classes", "matieres.id_classe", "=", "classes.id")
            ->select("classes.nomClasse as name", DB::raw('COUNT(id_classe) as value'))
            ->orderBy('value', 'desc')
            ->groupBy("name")->take(6)->get();

        return $produits;
    }
}
