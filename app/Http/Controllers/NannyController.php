<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\RegisterChild;
use App\Models\Transaction;
use App\Models\Nanny;
use App\Models\WaitingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class NannyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nanny = WaitingList::join('biodatachild', 'waitinglist.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->where("status", "Pending")
        ->get(); 

        $nannyProgress = WaitingList::join('biodatachild', 'waitinglist.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->where("status", "Progress")
        ->get(); 

        $employee = BiodataEmployee::all(); 

        return view('dashboards.admins.baru.tungguperawat', compact("nanny", "employee", "nannyProgress"));

    }

    public function InputForm(Request $request)
    {
        $pass = Hash::make($request->get("password"));

        $dataUser = new User;
        $dataUser->name  = $request->get("name");
        $dataUser->email = $request->get("email");
        $dataUser->role = 3;
        $dataUser->password = $pass;
        $dataUser->save();

        $userId = DB::table('users')->where('email', $request->get("email"))->first();

        $dataEmployee = new BiodataEmployee;
        $dataEmployee->id_account  = $userId->id;
        $dataEmployee->full_name  = $request->get("name");
        $dataEmployee->gender  = $request->get("gender");
        $dataEmployee->phone_number = $request->get("telp");
        $dataEmployee->save();

        return redirect('/admin/employee');
    }

    public function InputNanny(Request $request)
    {
        $nanny = new Nanny;
        $nanny->id_biodataChild = $request->get("idchild");
        $nanny->id_biodataEmployee  = $request->get("idnanny");
        $nanny->save();

        DB::table('waitinglist')
                ->where('id_waitingList', $request->get("idwaitinglist"))
                ->update(['status' => 'Progress']);

        return redirect('/admin/nanny');
    }
}
