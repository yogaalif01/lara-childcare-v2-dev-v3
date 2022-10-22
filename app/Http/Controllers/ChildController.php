<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\RegisterChild;
use App\Models\DetailChild;
use App\Models\ChildActivity;
use App\Models\Nanny;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->session()->get('idUser');

        // $child = Nanny::join('biodatachild', 'nanny.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        // -join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        // ->get(['biodatachild.id_biodataChild', 'biodataparent.father_name', 'biodataparent.mother_name', 'biodatachild.full_name', 'biodatachild.gender']); 
        // ->get();

        $child = DB::table('nanny')->where('id_biodataEmployee', $id)
        ->join('biodatachild', 'nanny.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->get(['biodatachild.id_biodataChild', 'biodataparent.father_name', 'biodataparent.mother_name', 'biodatachild.full_name', 'biodatachild.gender']); 

        return view('dashboards.employees.baru.childdetail', compact("child"));
        // print_r($payment);
    }

    public function InputForm(Request $request)
    {
        $data = new DetailChild;
        $data->id_biodataChild  = $request->get("id");
        $data->condition  = $request->get("condition");
        $data->health  = $request->get("health");
        $data->date  = date('Y-m-d');
        $data->save();

        return redirect('/employee/childDetail');
    }

    public function InputFormACtivity(Request $request)
    {
        $date = date("Y-m-d");

        $data = new ChildActivity;
        $data->id_biodataChild  = $request->get("id");
        $data->activity  = $request->get("activity");
        $data->indicator  = $request->get("detail_activity");
        $data->evaluation  = $request->get("status");
        $data->date	= $date;
        $data->save();

        return redirect('/employee/childDetail');
    }
}
