<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Ecole;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Alert;

class ClasseController extends Controller
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

            $data = Classe::join('ecoles', 'classes.id_ecole', '=', 'ecoles.id')
                            ->where("classes.is_deleted","=",false)
                            ->get(['classes.*', 'ecoles.nom as nomEcole']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("classe.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("classe.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('classes.classes');
    }

    public function add()
    {
        $ecoles = Ecole::all();

        return view("classes.add")->with([
            "ecoles" => $ecoles,
        ]);

    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nomClasse" => "required|unique:classes",
            "id_ecole" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("classe.add")
                ->withErrors($validator)
                ->withInput();
        }

        Classe::create([
            'nomClasse' => $credentials['nomClasse'],
            'id_ecole' => $credentials['id_ecole'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle ecole ajouté avec succès');

        return redirect()->route("classes");
    }

    public function edit($id)
    {
        $ecoles = Ecole::all();
        $classe = Classe::find($id);

        return view("classes.edit")->with([
            "ecoles" => $ecoles,
            "classe" => $classe,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("classes");
        }
        $classe = Classe::find($id);

        if (!$classe) {
            return redirect()->route("classes");
        }

        $validator = Validator::make($credentials, [
            "nomClasse" => "required|unique:classes,nomClasse," . $id,
            "id_ecole" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("ecole.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $classe->update([
            "nomClasse" => $request->nomClasse,
            "id_ecole" => $request->id_ecole,
        ]);
        Alert::success('modifiée avec succès', 'classe modifiée avec succès');

        return redirect()->route("classes");
    }


    public function distroy($id)
    {
        $classe = Classe::find($id);
        if (!$classe) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $classe->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    // apis

    public function getAllClasses(){

        $classes = Classe::all();
        
        return response()->json([
            "success" => true,
            "message" => "liste des classes",
            "data" => $classes,
            "count_classes" => $classes->count(),
        ], 200);

    }

    public function getClassesBySchoolId(Request $request,$id_ecole){
        
        $classes = DB::table('classes')->where("id_ecole","=",$id_ecole)->get();

        return response()->json([
            'message' => 'listes des classes',
            'data' => $classes
        ], 200);
    }
}
