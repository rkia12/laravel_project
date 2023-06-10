<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
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

            $data = User::join('villes', 'users.id_ville', '=', 'villes.id')
                        ->where("users.isAdmin",'=','0')
                        ->where("users.is_deleted","=",false)
                        ->get(['users.*', 'villes.nomVille']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("etudiant.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Supprimer</button>
                                </form>
                                <a href="' . route("etudiant.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                }) 
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('etudiants.etudiants');
    }

    public function add()
    {
        $villes = Ville::all();
        return view("etudiants.add")->with([
            "villes"=>$villes,
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users",
            "tel" => "required",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024|required",
            "date_u" => "required|date",
            "id_ville" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("etudiant.add")
                ->withErrors($validator)
                ->withInput();
        }

            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("usersImages"), $file_name);

        User::create([
            'nom' => $credentials['nom'],
            'prenom' => $credentials['prenom'],
            'email' => $credentials['email'],
            'photo' => $file_name,
            'tel' => $credentials['tel'],
            'id_ville' => $credentials['id_ville'],
            'date_u' => $credentials['date_u'],
            'password'=>"defaultpassword"
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle etudiant ajouté avec succès');

        return redirect()->route("etudiants");
    }

    public function edit($id)
    {
        $villes = Ville::all();
        $user = User::find($id);

        return view("etudiants.edit")->with([
            "user" => $user,
            "villes"=>$villes,
        ]);
    }

    public function update(Request $request,$id){
        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users,email," . $id,
            "tel" => "required",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024",
            "date_u" => "required|date",
            "id_ville" => "required",
        ]);

        $user = User::find($id);

        if ($validator->fails()) {
            return redirect()->route("etudiant.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('photo')){

            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("usersImages"), $file_name);

            $user->update([
                'nom' => $credentials['nom'],
                'prenom' => $credentials['prenom'],
                'email' => $credentials['email'],
                'photo' => $file_name,
                'tel' => $credentials['tel'],
                'id_ville' => $credentials['id_ville'],
                'date_u' => $credentials['date_u'],
                'password'=>"defaultpassword"
            ]);
        }else{
            $user->update([
                'nom' => $credentials['nom'],
                'prenom' => $credentials['prenom'],
                'email' => $credentials['email'],
                'tel' => $credentials['tel'],
                'id_ville' => $credentials['id_ville'],
                'date_u' => $credentials['date_u'],
                'password'=>"defaultpassword"
            ]);
        }

        Alert::success('Modifier avec succès', 'etudiant modifier avec succès');

        return redirect()->route("etudiants");
    }

    public function distroy($id)
    {
        $user = User::find($id);
        if (!$user) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $user->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }

    // adminstrateurs

    public function index_admin(Request $request){
        if ($request->ajax()) {

            $data = User::where("users.isAdmin",'=','1')
                        ->where("users.is_deleted","=",false)
                        ->get(['users.*']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '<form action=' . route("administrateur.delete", $row->id) . ' method="post" class="form p-0 m-0 float-start mb-2 delete-confirm">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" /> 
                                </form>
                                <a href="' . route("administrateur.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>';
                    return $btn;
                }) 
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('administrateurs.administrateurs');
    }

    public function add_admin()
    {
        return view("administrateurs.add");
    }

    public function store_admin(Request $request)
    {

        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users",
            "tel" => "required",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024|required",
            "date_u" => "required|date",
            "password" => "required|confirmed|min:6",
        ]);

        if ($validator->fails()) {
            return redirect()->route("administrateur.add")
                ->withErrors($validator)
                ->withInput();
        }

            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("usersImages"), $file_name);

        User::create([
            'nom' => $credentials['nom'],
            'prenom' => $credentials['prenom'],
            'email' => $credentials['email'],
            'photo' => $file_name,
            'tel' => $credentials['tel'],
            'date_u' => $credentials['date_u'],
            'password'=>Hash::make($credentials['password']),
            "isAdmin"=>1,
            "id_ville"=>-1
        ]);
        Alert::success('Ajouté avec succès', 'Nouvelle administrateur ajouté avec succès');

        return redirect()->route("administrateurs");
    }

    public function edit_admin($id)
    {
        $user = User::find($id);

        return view("administrateurs.edit")->with([
            "user" => $user,
        ]);
    }

    public function update_admin(Request $request,$id){
        $credentials = $request->all();

        $user = User::find($id);

        $validator = Validator::make($credentials, [
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users,email," . $id,
            "tel" => "required",
            "photo" => "mimes:jpeg,png,jpg,gif|max:1024",
            "date_u" => "required|date",
            "old_password" => "required|min:6",
        ]);

        if(!Hash::check($credentials['old_password'], $user->password)){
            throw ValidationException::withMessages([
                "old_password" => ["old Password is wrong"]
            ]);
        }

        if($request->has('new_password') && strlen($request->new_password) >0){
            if(strlen($request->new_password)<6){
                throw ValidationException::withMessages([
                    "new_password" => ["new Password length must be grether than or equal 6"]
                ]); 
            }
            if(!$request->has('password_confirmation')){
                throw ValidationException::withMessages([
                    "new_password" => ["new Password must be confirmed"]
                ]); 
            }

            if($request->new_password != $request->password_confirmation){
                throw ValidationException::withMessages([
                    "new_password" => ["new Password and confirmation are not matched"]
                ]); 
            }
        }


        if ($validator->fails()) {
            return redirect()->route("administrateur.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('photo')){


            $file = $request->file("photo");
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("usersImages"), $file_name);

            if($request->has('new_password') && strlen($request->new_password) >0){

                $user->update([
                    'nom' => $credentials['nom'],
                    'prenom' => $credentials['prenom'],
                    'email' => $credentials['email'],
                    'photo' => $file_name,
                    'tel' => $credentials['tel'],
                    'date_u' => $credentials['date_u'],
                    'password'=>Hash::make($credentials['new_password']),
                ]);
            }else{
                $user->update([
                    'nom' => $credentials['nom'],
                    'prenom' => $credentials['prenom'],
                    'email' => $credentials['email'],
                    'photo' => $file_name,
                    'tel' => $credentials['tel'],
                    'date_u' => $credentials['date_u'],
                ]);
            }

        }else{
            if($request->has('new_password') && strlen($request->new_password) >0){

                $user->update([
                    'nom' => $credentials['nom'],
                    'prenom' => $credentials['prenom'],
                    'email' => $credentials['email'],
                    'tel' => $credentials['tel'],
                    'date_u' => $credentials['date_u'],
                    'password'=>Hash::make($credentials['new_password']),
                ]);
            }else{
                $user->update([
                    'nom' => $credentials['nom'],
                    'prenom' => $credentials['prenom'],
                    'email' => $credentials['email'],
                    'tel' => $credentials['tel'],
                    'date_u' => $credentials['date_u'],
                ]);
            }
        }

        Alert::success('Modifier avec succès', 'administrateur modifier avec succès');

        return redirect()->route("administrateurs");
    }

    public function distroy_admin($id)
    {
        $user = User::find($id);
        if (!$user) {

            Alert::error('erreur', "Une erreur s'est produite lors du traitement de votre demande");
            return redirect()->back();
        }

        $user->update([
            "is_deleted"=>true,
        ]);
        Alert::success('Supprmé avec succès', "Enregistrement supprimé avec succès");
        return redirect()->back();
    }



    // apis
    public function getUserByCityId(Request $request,$id_ville){

        $user = DB::table('users')->where("id_ville","=",$id_ville)->first();

        return response()->json([
            'message' => 'user detail',
            'data' => $user
        ], 200);


    }
}
