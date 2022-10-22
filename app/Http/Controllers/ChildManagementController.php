<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\ChildManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ChildManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');
        $child = DB::table('nanny')->where('id_biodataEmployee', $id)
        ->join('biodatachild', 'nanny.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->get(['biodatachild.id_biodataChild', 'biodataparent.father_name', 'biodataparent.mother_name', 'biodatachild.full_name', 'biodatachild.gender']); 

        return view('dashboards.employees.baru.child', compact("child"));
    }

    public function InputForm(Request $request)
    {
        $id = $request->session()->get('idUser');
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d");
        $time = date("h:i");

        $data = new Attendance;
        $data->id_biodataEmployee = $id;
        $data->code_fee = 1;
        $data->date = $date;
        $data->time = $time;
        $data->status = "Hadir";
        $data->save();

        return redirect('/employee/attendance');
    }
}
