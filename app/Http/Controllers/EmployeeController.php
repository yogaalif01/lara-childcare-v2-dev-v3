<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\BiodataEmployee;
use App\Models\RegisterChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $biodataEmployee = BiodataEmployee::join('users', 'biodataemployee.id_account', '=', 'users.id')
        ->get(); 

        return view('dashboards.admins.baru.karyawan', compact("biodataEmployee"));

    }
    public function editkaryawan($id)
    {
        $data = DB::table("biodataemployee")->where("id_biodataEmployee",$id)->first();

        return json_encode(["data" => $data]);
    }
    public function updatekaryawan($id, Request $request)
    {
        $data = DB::table("biodataemployee")->where("id_biodataEmployee",$id)->update([
            "full_name" => $request->full_name,
            "gender"    => $request->gender,
            "join_date" => $request->join_date,
            "brith_date" => $request->brith_date,
            "brith_place" => $request->brith_place,
            "address"   => $request->address,
            "phone_number" => $request->phone_number,
            "status"    => $request->status,
            "religion"    => $request->religion,
            "last_education"    => $request->last_education,
            "institution"    => $request->institution,
        ]);

        return json_encode(["data" => $data]);
    }
    public function deletekaryawan($id)
    {
        DB::table("biodataemployee")->where("id_biodataEmployee",$id)->delete();

        return redirect('/admin/employe');
    }


    public function InputForm(Request $request)
    {
        $pass = Hash::make($request->get("password"));

        $account = new Account();
        $account->id_role = 3;
        $account->email = $request->get("email");
        $account->username = $request->get("username");
        $account->password = $pass;
        $account->save();

        $dataUser = new User;
        $dataUser->name  = $request->get("full_name");
        $dataUser->email = $request->get("email");
        $dataUser->role = 3;
        $dataUser->password = $pass;
        $dataUser->save();

        $userId = DB::table('users')->where('email', $request->get("email"))->first();

        $dataEmployee = new BiodataEmployee;
        $dataEmployee->id_account  = $userId->id;
        $dataEmployee->full_name  = $request->get("full_name");
        $dataEmployee->gender  = $request->get("gender");
        $dataEmployee->join_date  = $request->get("join_date");
        $dataEmployee->brith_date  = $request->get("brith_date");
        $dataEmployee->brith_place  = $request->get("brith_place");
        $dataEmployee->address  = $request->get("address");
        $dataEmployee->phone_number  = $request->get("phone_number");
        $dataEmployee->status = $request->get("status");
        $dataEmployee->religion = $request->get("religion");
        $dataEmployee->last_education = $request->get("last_education");
        $dataEmployee->institution = $request->get("institution");
        $dataEmployee->save();

        return redirect('/admin/employee');
    }
}
