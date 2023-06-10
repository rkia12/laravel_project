<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Matiere;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
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

            $data = Categorie::join('matieres', 'categories.id_matiere', '=', 'matieres.id')
            ->leftJoin('categories as cat2', 'cat2.id', '=', 'categories.id_subCategorie')
            ->where("categories.is_deleted","=",false)
            ->get(['categories.*','cat2.nom as nomParent', 'matieres.nom_matiere']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("category.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("category.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('categories.categories');
    }

    public function add()
    {
        $categories = Categorie::all();
        $matieres = Matiere::all();

        return view("categories.add")->with([
            "categories" => $categories,
            'matieres' => $matieres,
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required|unique:categories",
            "id_matiere" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("category.add")
                ->withErrors($validator)
                ->withInput();
        }

        Categorie::create([
            'nom' => $credentials['nom'],
            'id_matiere' => $credentials['id_matiere'],
            'id_subCategorie' => $credentials['id_categorieParent'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle categorie ajouté avec succès');

        return redirect()->route("categories");
    }

    public function edit($id)
    {
        $categories = Categorie::all();
        $matieres = Matiere::all();
        $categorie = Categorie::find($id);

        return view("categories.edit")->with([
            "categorie" => $categorie,
            "categories" => $categories,
            'matieres' => $matieres,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("categories");
        }
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return redirect()->route("categories");
        }

        $validator = Validator::make($credentials, [
            "nom" => "required|unique:categories,nom," . $id,
            "id_matiere" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("category.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $categorie->update([
            "nom" => $request->nom,
            "id_matiere" => $request->id_matiere,
            'id_subCategorie' => $credentials['id_categorieParent'],
        ]);
        Alert::success('modifiée avec succès', 'categorie modifiée avec succès');

        return redirect()->route("categories");
    }


    public function distroy($id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $categorie->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }


    public function getAllCategories(){

        $categories = Categorie::all();
        
        return response()->json([
            "success" => true,
            "message" => "liste des categories",
            "data" => $categories,
            "count_categories" => $categories->count(),
        ], 200);

    }

    public function getCategoriesByMatiereId(Request $request,$id_matiere){
        
        $categories = DB::table('categories')->where("id_matiere","=",$id_matiere)->get();

        return response()->json([
            'message' => 'listes des categories',
            'data' => $categories
        ], 200);
    }

    public function getCategoriesOfCatId(Request $request,$id_categorie){
        
        $categories = DB::table('categories')->where("id_subCategorie","=",$id_categorie)->get();

        return response()->json([
            'message' => 'listes sub categories de categorie n = '.$id_categorie,
            'data' => $categories
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $categorie = Categorie::find($id);

        return response()->json([
            'message' => 'categorie',
            'data' => $categorie
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
