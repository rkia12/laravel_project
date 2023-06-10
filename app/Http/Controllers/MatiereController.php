<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Classe;
use Illuminate\Support\Facades\DB;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;

class MatiereController extends Controller
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

            $data = Matiere::join('classes', 'matieres.id_classe', '=', 'classes.id')
                            ->where("matieres.is_deleted","=",false)
                            ->get(['matieres.*', 'classes.nomClasse']);


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("matiere.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("matiere.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('matieres.matieres');
    }

    public function add()
    {

        $classes = Classe::all();

        return view("matieres.add")->with([
            "classes" => $classes,
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom_matiere" => "required|unique:matieres",
            "fichier_scol" => "required",
            "id_classe" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("matiere.add")
                ->withErrors($validator)
                ->withInput();
        }

        Matiere::create([
            'nom_matiere' => $credentials['nom_matiere'],
            'fichier_scol' => $credentials['fichier_scol'],
            'id_classe' => $credentials['id_classe'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle matiere ajouté avec succès');

        return redirect()->route("matieres");
    }

    public function edit($id)
    {
        $matiere = Matiere::find($id);
        $classes = Classe::all();

        return view("matieres.edit")->with([
            "classes" => $classes,
            "matiere" => $matiere,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("matieres");
        }
        $matiere = Matiere::find($id);

        if (!$matiere) {
            return redirect()->route("matieres");
        }

        $validator = Validator::make($credentials, [
            "nom_matiere" => "required|unique:matieres,nom_matiere," . $id,
            "fichier_scol" => "required",
            "id_classe" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("matiere.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $matiere->update([
            "nom_matiere" => $request->nom_matiere,
            "fichier_scol" => $request->fichier_scol,
            'id_classe' => $credentials['id_classe'],
        ]);
        Alert::success('modifiée avec succès', 'matiere modifiée avec succès');

        return redirect()->route("matieres");
    }

    public function distroy($id)
    {
        $matiere = Matiere::find($id);
        if (!$matiere) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $matiere->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    public function getAllMaterials(){
        $matieres = Matiere::all();

        return response()->json([
            "success" => true,
            "message" => "liste des matieres",
            "data" => $matieres,
            "count_matieres" => $matieres->count(),
        ], 200);
    }

    public function getMatieresByClasseId(Request $request,$id_classe){
        
        $classes = DB::table('matieres')->where("id_classe","=",$id_classe)->get();

        return response()->json([
            'message' => 'listes des classes',
            'data' => $classes
        ], 200);
    }
}
