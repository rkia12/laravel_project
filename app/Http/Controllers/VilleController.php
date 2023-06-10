<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;

class VilleController extends Controller
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

            $data = Ville::where("is_deleted","=",false);


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("ville.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("ville.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view("villes.villes");
    }

    public function add(){ 

        return view("villes.add");

    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nomVille" => "required|unique:villes",
        ]);

        if ($validator->fails()) {
            return redirect()->route("ville.add")
                ->withErrors($validator)
                ->withInput();
        }

        Ville::create([
            'nomVille' => $credentials['nomVille'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle Ville ajouté avec succès');

        return redirect()->route("villes");
    }

    public function edit($id)
    {
        $ville = Ville::find($id);

        return view("villes.edit")->with([
            "ville" => $ville,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("villes");
        }
        $ville = Ville::find($id);

        if (!$ville) {
            return redirect()->route("villes");
        }

        $validator = Validator::make($credentials, [
            "nomVille" => "required|unique:villes,nomVille," . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->route("ville.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $ville->update([
            "nomVille" => $request->nomVille,
        ]);
        Alert::success('modifiée avec succès', 'ville modifiée avec succès');

        return redirect()->route("villes");
    }

    public function distroy($id)
    {
        $ville = Ville::find($id);
        if (!$ville) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $ville->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    // api
    public function getAllCities(){
        
        $villes = Ville::all();

        return response()->json([
            'message' => 'Toutes les Villes',
            'data' => $villes
        ], 200);
    }
    
    public function getCityByName(Request $request,$nom){


        $ville = DB::table('villes')->where('nomVille','like',$nom )->first();;

        return response()->json([
            'message' => 'Ville detail',
            'data' => $ville
        ], 200);

    }
}
