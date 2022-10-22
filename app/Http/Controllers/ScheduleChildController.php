<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\ChildManagement;
use App\Models\ScheduleChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ScheduleChildController extends Controller
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
        $schedule = DB::table('schedulechild')->where('id_biodataChild', $idchild)
        ->get();

        return view('dashboards.employees.schedule', compact("schedule"));
    }

    public function InputForm(Request $request)
    {
        $id = $request->session()->get('idUser');

        $data = new ScheduleChild;
        $data->id_biodataChild  = $request->get("idchild");
        $data->note  = $request->get("note");
        $data->date  = $request->get("date");
        $data->time_come  = $request->get("time_come");
        $data->time_gohome  = $request->get("time_gohome");
        $data->save();

        return redirect('/employee/schedule?id='.$request->get("idchild"));
    }
}
