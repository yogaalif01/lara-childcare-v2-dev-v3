<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChildActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ReportDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $idchild = $_GET["id"];

        if($_GET["date"]){
            $report = DB::table('childactivity')->where('id_biodataChild', $idchild)->where('date', $_GET['date'])->get();
        }else{
            $report = DB::table('childactivity')->where('id_biodataChild', $idchild)->get();
        }

        // $date = DB::table('childactivity')->where('id_biodataChild', $idchild)->groupBy('date')->get();
        $date = DB::table('childactivity')
        ->select('date', DB::raw('count(*) as total'))
        ->groupBy('date')
        ->get();

        // print_r($date);
        return view('dashboards.users.reportDetail', compact("date", "report"));
    }
    public function reportdetail($id)
    {
        $aktivitas = DB::table('childactivity')->where("id_biodataChild",$id)->get();
        

        return view('dashboards.users.baru.laporan_detail',compact('aktivitas'));
    }
    public function scheduledetail($id)
    {
        $schedule = DB::table('schedulechild')->where("id_biodataChild",$id)->get();

        return view('dashboards.users.baru.schedule_detail',compact('schedule'));
    }

    public function InputForm(Request $request)
    {
        $data = new DetailChild;
        $data->id_biodataChild  = $request->get("id");
        $data->condition  = $request->get("condition");
        $data->health  = $request->get("health");
        $data->note  = $request->get("note");
        $data->save();

        return redirect('/employee/childDetail');
    }

    public function InputFormACtivity(Request $request)
    {
        $date = date("Y-m-d");

        $data = new ChildActivity;
        $data->id_biodataChild  = $request->get("id");
        $data->activity  = $request->get("activity");
        $data->detail_activity  = $request->get("detail_activity");
        $data->type_activity  = $request->get("type_activity");
        $data->date	= $date;
        $data->equipment  = $request->get("equipment");
        $data->status  = "Done";
        $data->save();

        return redirect('/employee/childDetail');
    }
}
