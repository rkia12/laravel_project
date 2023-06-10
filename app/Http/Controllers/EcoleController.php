<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecole;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Alert;

class EcoleController extends Controller
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

            $data = Ecole::join('villes', 'ecoles.id_ville', '=', 'villes.id')
                            ->where("ecoles.is_deleted","=",false)
                            ->get(['ecoles.*', 'villes.nomVille']);


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("ecole.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("ecole.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('ecoles.ecoles');
    }

    public function edit($id)
    {
        $villes = Ville::all();
        $ecole = Ecole::find($id);

        return view("ecoles.edit")->with([
            "villes" => $villes,
            'ecole' => $ecole,
        ]);
    }

    public function add()
    {
        $villes = Ville::all();

        return view("ecoles.add")->with([
            "villes" => $villes,
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required|unique:ecoles",
            "id_ville" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("ecole.add")
                ->withErrors($validator)
                ->withInput();
        }

        Ecole::create([
            'nom' => $credentials['nom'],
            'id_ville' => $credentials['id_ville'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle categorie ajouté avec succès');

        return redirect()->route("ecoles");
    }


    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("ecoles");
        }
        $ecole = Ecole::find($id);

        if (!$ecole) {
            return redirect()->route("ecoles");
        }

        $validator = Validator::make($credentials, [
            "nom" => "required|unique:ecoles,nom," . $id,
            "id_ville" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("ecole.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $ecole->update([
            "nom" => $request->nom,
            "id_ville" => $request->id_ville,
        ]);
        Alert::success('modifiée avec succès', 'ecole modifiée avec succès');

        return redirect()->route("ecoles");
    }


    public function distroy($id)
    {
        $ecole = Ecole::find($id);
        if (!$ecole) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $ecole->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    public function getAllSchools(){
        $ecoles = Ecole::all();

        return response()->json([
            'message' => 'all scholl',
            'data' => $ecoles
        ], 200);

    }
    public function getSchoolByCityId(Request $request,$id_ville){

        $ecole = DB::table('ecoles')->where("id_ville","=",$id_ville)->get();

        return response()->json([
            'message' => 'scholl detail',
            'data' => $ecole
        ], 200);
        

    }

}
