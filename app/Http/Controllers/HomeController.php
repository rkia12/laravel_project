<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Matiere;
use App\Models\Classe;
use App\Models\Pack;
use App\Models\Produit;
use App\Models\Ecole;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nbre_canceled_orders = Order::where("status","annulee")->count();
        $nbre_completed_orders = Order::where("status","terminee")->count();
        $nbre_pending_orders = Order::where("status","attente")->count();
        $nbre_orders = Order::all()->count();
        $available_years = Order::select(DB::raw('YEAR(created_at) as year'))->orderBy('year', 'desc')->distinct()->get();
        $available_years = $available_years->pluck('year');

        $commandes = Order::orderBy("id","DESC")
                            ->take(5)
                            ->get();

        $nbre_etudiants = User::where("isAdmin",'=',0)->count();
        $nbre_classes = Classe::all()->count();
        $nbre_produits = Produit::all()->count();
        $nbre_ecoles = Ecole::all()->count();
        $nbre_villes = Ville::all()->count();
        $nbre_matires = Matiere::all()->count();
        $nbre_packs = Pack::all()->count();
        $nbre_categories = Pack::all()->count();
        
        return view('home')->with([
            "nbre_completed_orders"=>$nbre_completed_orders,
            "nbre_canceled_orders"=>$nbre_canceled_orders,
            "nbre_pending_orders"=>$nbre_pending_orders,
            "nbre_orders"=>$nbre_orders,
            "commandes"=>$commandes,
            "available_years"=>$available_years,
            'nbre_etudiants'=>$nbre_etudiants,
            'nbre_classes'=>$nbre_classes,
            'nbre_ecoles'=>$nbre_ecoles,
            'nbre_produits'=>$nbre_produits,
            'nbre_villes'=>$nbre_villes,
            'nbre_matires'=>$nbre_matires,
            'nbre_packs'=>$nbre_packs,
            'nbre_categories'=>$nbre_categories,
        ]);
    }
}
