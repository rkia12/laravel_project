<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Matiere;
use App\Models\Categorie;
use App\Models\Pack;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Alert;

class ProduitController extends Controller
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
    
    public function index(Request $request){
        if ($request->ajax()) {

            $data = Produit::join('categories', 'produits.id_categorie', '=', 'categories.id')
                            ->join('packs', 'produits.id_pack', '=', 'packs.id')
                            ->where("produits.is_deleted","=",false)
                            ->get(['produits.*', 'categories.nom as nomCategorie','packs.type as packType']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("produit.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("produit.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('produits.produits');
    }

    public function add()
    {
        $categories = Categorie::all();
        $packs = Pack::all();

        return view("produits.add")->with([
            "categories" => $categories,
            'packs' => $packs,
        ]);;
    }


    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "description" => "required",
            "prix" => "required|numeric",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024|required",
            "size" => "required",
            "couleur" => "required",
            "quantite" => "required|numeric",
            "id_categorie" => "required",
            "id_pack" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("produit.add")
                ->withErrors($validator)
                ->withInput();
        }

            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("productsImages"), $file_name);

        Produit::create([
            'nom' => $credentials['nom'],
            'description' => $credentials['description'],
            'prix' => $credentials['prix'],
            'photo' => $file_name,
            'size' => $credentials['size'],
            'couleur' => $credentials['couleur'],
            'quantite' => $credentials['quantite'],
            'id_categorie' => $credentials['id_categorie'],
            'id_pack' => $credentials['id_pack'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle produit ajouté avec succès');

        return redirect()->route("produits");
    }

    public function edit($id)
    {
        $categories = Categorie::all();
        $packs = Pack::all();
        $produit = Produit::find($id);

        return view("produits.edit")->with([
            "produit" => $produit,
            "categories" => $categories,
            'packs' => $packs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("produits");
        }
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->route("produits");
        }

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "description" => "required",
            "prix" => "required|numeric",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024",
            "size" => "required",
            "couleur" => "required",
            "quantite" => "required|numeric",
            "id_categorie" => "required",
            "id_pack" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("produit.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        if($request->hasFile('photo')){

            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("productsImages"), $file_name);

            $produit->update([
                'nom' => $credentials['nom'],
                'description' => $credentials['description'],
                'prix' => $credentials['prix'],
                'size' => $credentials['size'],
                'photo' => $file_name,
                'couleur' => $credentials['couleur'],
                'quantite' => $credentials['quantite'],
                'id_categorie' => $credentials['id_categorie'],
                'id_pack' => $credentials['id_pack'],
            ]);
        }else{
        
            $produit->update([
                'nom' => $credentials['nom'],
                'description' => $credentials['description'],
                'prix' => $credentials['prix'],
                'size' => $credentials['size'],
                'couleur' => $credentials['couleur'],
                'quantite' => $credentials['quantite'],
                'id_categorie' => $credentials['id_categorie'],
                'id_pack' => $credentials['id_pack'],
            ]);
        }

        Alert::success('modifiée avec succès', 'produit modifiée avec succès');

        return redirect()->route("produits");
    }


    public function distroy($id)
    {
        $produit = Produit::find($id);
        if (!$produit) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $produit->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    // apis
    public function getAllProducts(){

        $produits = Produit::all();
        
        return response()->json([
            "success" => true,
            "message" => "liste des produits",
            "data" => $produits,
            "count_produits" => $produits->count(),
        ], 200);

    }

    public function getProductsByCatId(Request $request,$id_categorie){
        
        $produits = DB::table('produits')->where("id_categorie","=",$id_categorie)->get();

        return response()->json([
            'message' => 'listes des produits que appartient a une categorie',
            'data' => $produits
        ], 200);
    }

    public function getProductsByPackId(Request $request,$id_pack){
        
        $produits = DB::table('produits')->where("id_pack","=",$id_pack)->get();

        return response()->json([
            'message' => 'listes des produits que appartient a un pack',
            'data' => $produits
        ], 200);
    }

    public function getProductsByPackIdAndCatId(Request $request,$id_categorie,$id_pack){
        
        $produits = DB::table('produits')->where("id_categorie","=",$id_categorie)
                                        ->where("id_pack","=",$id_pack)->get();

        return response()->json([
            'message' => 'listes des produits que appartient a une categori et un pack',
            'data' => $produits
        ], 200);
    }


    public function getProductsByMatiere(Request $request,$id_matiere){
        
        $produits = Matiere::join('categories', 'matieres.id', '=', 'categories.id_matiere')
                            ->join('produits', 'categories.id', '=', 'produits.id_categorie')
                            ->where('matieres.id', '=', $id_matiere)
                            ->get('produits.*');

        return response()->json([
            'message' => 'listes des produits que a relation avec une matiere donne',
            'data' => $produits
        ], 200);
    }
}
