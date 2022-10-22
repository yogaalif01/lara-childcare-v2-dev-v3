<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegisterChild;
use App\Models\ChildImprovment;
use App\Models\DailyHabbits;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;

class RegisterChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $biodataChild = DB::table('biodatachild')->where('id_biodataParent', $id)->get();
        $param = DB::table('transaction')
                ->select('id_biodataChild')
                ->where('status', "!=", "Done")
                ->groupBy('id_biodataChild')
                ->get();

        return view('dashboards.users.registerChild', compact("biodataChild", "param"));
    }

    public function cekhargapaket($id)
    {
        $data = DB::table("paket")->where("idpaket",$id)->first();

        return json_encode(["data" => $data]);
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
        // $data->usia = $request->get("usia");
        $data->save();

        $data = DB::table("biodatachild")->where("id_biodataParent",$id)->first();

        // $hbts = new DailyHabbits;
        // $hbts->id_biodataChild  = $data->id_biodataChild;
        // $hbts->bak = $request->get("bak");
        // $hbts->bab = $request->get("bab");
        // $hbts->toothBrush = $request->get("toothBrush");
        // $hbts->eat = $request->get("eat");
        // $hbts->drinkingMilk = $request->get("drinkingMilk");
        // $hbts->crying = $request->get("crying");
        // $hbts->play = $request->get("play");
        // $hbts->sleep = $request->get("sleep");
        // $hbts->etc = $request->get("etc");
        // $hbts->save();

        // $impr = new ChildImprovment;
        // $impr->id_biodataChild  = $data->id_biodataChild;
        // $impr->prenatal = $request->get("prenatal");
        // $impr->partus = $request->get("partus");
        // $impr->post_natal = $request->get("post_natal");
        // $impr->motoric_skill = $request->get("motoric_skill");
        // $impr->language_skill = $request->get("language_skill");
        // $impr->health_history = $request->get("health_history");
        // $impr->save();

        //transaksi

        if ($request->get("paket") == 1) {
            DB::table('transaction')->insert([
                "id_biodataChild" => $data->id_biodataChild,
                "nominal" =>  $request->get("nominal"),
                "status" => "Validation",
                "idpaket" => $request->get("paket"),
                "keterangan_paket" => $request->get("nmawalbln")."-".$request->get("nmawalakhir"),
                "status_pembayaran" => "validasi"
            ]);
        }
        if ($request->get("paket") == 2) {
            DB::table('transaction')->insert([
                "id_biodataChild" => $data->id_biodataChild,
                "nominal" =>  $request->get("nominal"),
                "status" => "Validation",
                "idpaket" => $request->get("paket"),
                "keterangan_paket" => $request->get("nmawalmg")."-".$request->get("nmakhirmg"),
                "status_pembayaran" => "validasi"
            ]);
        }
        if ($request->get("paket") == 3) {
            DB::table('transaction')->insert([
                "id_biodataChild" => $data->id_biodataChild,
                "nominal" =>  $request->get("total1"),
                "status" => "Validation",
                "idpaket" => $request->get("paket"),
                "keterangan_paket" => $request->get("nmhari"),
                "status_pembayaran" => "validasi"
            ]);
        }

        Session::flash('sukses','Data Berhasil Disimpan');
        return redirect('/user/registerChild1');
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
