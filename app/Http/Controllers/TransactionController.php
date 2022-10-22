<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegisterChild;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $goTransaction = Transaction::join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'transaction.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->where('transaction.id_biodataParent', $id)
        ->where('transction.status', 'Make Payment')
        ->get(['biodatachild.full_name', 'transaction.date', 'nominal', 'transaction.status']); 

        // $biodataChild = Transaction::join('biodata_child', 'transction.id_biodataChild', '=', 'biodata_child.id_biodataChild')
        // ->get(); 

        // echo "<pre>";
        // print_r($transaction);
        // echo "</pre>";
        return view('dashboards.users.transaction', compact("goTransaction"));

    }
  
    public function Entrusted(Request $request)
    {
        $date = date("Y-m-d H:i:s");

        $data = new Transaction;
        $data->id_biodataChild = $request->get("id_child");
        $data->date = $date;
        $data->nominal = 200000;
        $data->link_transfer = "-";
        $data->status = "Make Payment";
        $data->save();

        return redirect('/user/registerChild');
    }
}
