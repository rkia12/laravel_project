<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Ordre_produit;
use Illuminate\Support\Facades\DB;
use DataTables;
use Alert;
use Illuminate\Support\Facades\Validator;
use PDF;

class OrderController extends Controller
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
    
    //
    public function index(Request $request){
        if ($request->ajax()) {

            $data = Order::join('users', 'orders.id_utilisateur', '=', 'users.id')
                        ->where("users.isAdmin",'=','0')
                        ->where("orders.is_deleted","=",false)
                        ->orderBy('orders.status', 'ASC')
                        ->get(['users.nom as utilisateur','users.tel as tel','users.email as email', 'orders.*']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $btn = '
                                <a href="' . route("ordre.edit", $row->id) . '" class="btn btn-success btn-sm">Modifier</a>
                                <a href="' . route("ordre.viewOrdre", $row->id) . '" class="btn btn-info btn-sm" target="_blank">Voir</a>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('ordres.ordres');
    }

    public function edit($id){

        $ordere = Order::find($id);
        $statusList = ["attente","annulee","terminee"];

        return view('ordres.edit')->with([
            "statusList"=>$statusList,
            "ordere"=>$ordere,
        ]);
    }

    public function update(Request $request, $id)
    {
        $credentials = $request->all();

        if (!$id) {
            return redirect()->route("ordres");
        }
        $ordere = Order::find($id);

        if (!$ordere) {
            return redirect()->route("ordres");
        }

        $validator = Validator::make($credentials, [
            "status" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->route("ordre.edit", $id)
                ->withErrors($validator)
                ->withInput();
        }
        $ordere->update([
            "status" => $request->status,
        ]);
        Alert::success('modifiée avec succès', 'ordere modifiée avec succès');

        return redirect()->route("ordres");
    }


    public function viewCommande($id)
    {
        $commande = Order::findOrFail($id);
        $produitsCommande = Ordre_produit::join("produits","ordre_produits.id_produit","=","produits.id")
                            ->where("id_ordre","=",$id)
                            ->get(['produits.*',"ordre_produits.id as ordre_produit_id","ordre_produits.quantite as quantiteOrdre"]);

        $data=[
            "commande"=>$commande,
            "produitsCommande"=>$produitsCommande,
        ];
        $pdf = PDF::loadView('pdf.commande', $data);


        return $pdf->stream('commande.pdf');
    }

}
