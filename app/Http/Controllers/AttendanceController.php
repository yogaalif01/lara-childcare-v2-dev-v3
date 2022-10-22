<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $attendance = Attendance::where('id_biodataEmployee', $id)->get();
       
        $count = Attendance::select(DB::raw('COUNT(*) as total'))->where('id_biodataEmployee', $id)->get(); 
        // $attendance = Attendance::join('biodata_employee', 'attendance.id_biodataEmployee', '=', 'biodata_employee.id_biodataEmployee')->get(); 

        return view('dashboards.employees.baru.attendance', compact("attendance", "count"));

    }

    public function InputForm(Request $request)
    {
        $id = $request->session()->get('idUser');
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
        $time = date("h:i");

        $data = new Attendance;
        $data->id_biodataEmployee = $id;
        $data->date = $date;
        $data->time = $time;
        $data->status = "Hadir";
        $data->save();

        return redirect('/employee/attendance');
    }
}
