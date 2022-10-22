<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parent = BiodataUser::all();
        return view('dashboards.employees.baru.biodataparent', compact("parent"));
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
