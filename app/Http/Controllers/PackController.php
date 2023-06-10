<?php

namespace App\Http\Controllers;


use App\Models\Pack;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;

class PackController extends Controller
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

            $data = Pack::where("is_deleted","=",false);


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("pack.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("pack.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view("packs.packs");
    }

    public function add(){ 

        return view("packs.add");

    }


    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "type" => "required|unique:packs",
        ]);

        if ($validator->fails()) {
            return redirect()->route("pack.add")
                ->withErrors($validator)
                ->withInput();
        }

        Pack::create([
            'type' => $credentials['type'],
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle pack ajouté avec succès');

        return redirect()->route("packs");
    }

    public function edit($id)
    {
        $pack = Pack::find($id);

        return view("packs.edit")->with([
            "pack" => $pack,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("packs");
        }
        $pack = Pack::find($id);

        if (!$pack) {
            return redirect()->route("packs");
        }

        $validator = Validator::make($credentials, [
            "type" => "required|unique:packs,type," . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->route("pack.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $pack->update([
            "type" => $request->type,
        ]);
        Alert::success('modifiée avec succès', 'pack modifiée avec succès');

        return redirect()->route("packs");
    }


    public function distroy($id)
    {
        $pack = Pack::find($id);
        if (!$pack) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $pack->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }
}
