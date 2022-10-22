<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegisterChild;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;
use Auth;

class DataChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $datachild = DB::table('biodatachild')->where('id_biodataParent', $id)->get();

        return view('dashboards.users.childfull', compact("datachild"));

    }

    public function InputForm(Request $request)
    {
        $id = $request->session()->get('idUser');

        $data = new RegisterChild;
        $data->id_biodataParent  = $id;
        $data->full_name = $request->get("full_name");
        $data->nickname = $request->get("nickname");
        $data->brith_date = $request->get("brith_date");
        $data->brith_place = $request->get("brith_place");
        $data->gender = $request->get("gender");
        $data->child_siblings = $request->get("child_siblings");
        $data->child_siblings_of = $request->get("child_siblings_of");
        $data->child_outside_activity = $request->get("child_outside_activity");
        $data->religion = $request->get("religion");
        $data->save();

        return redirect('/user/registerChild');
    }

    public function Entrusted(Request $request)
    {
        $date = date("Y-m-d");
        $id = $request->session()->get('idUser');

        $data = new Transaction;
        $data->id_biodataChild = $request->get("id_child");
        $data->date = $date;
        $data->nominal = 200000;
        $data->link_transfer = "-";
        $data->status = "Make Payment";
        $data->packet = "2 weeks";
        $data->save();

        $payment = DB::table('transaction')
        ->where('id_biodataChild', $request->get("id_child"))
        ->where('date', $date)
        ->where('status', "Make Payment")
        ->first();

        return redirect('/user/payment?id='.$payment->id_transaction);
    }
}
