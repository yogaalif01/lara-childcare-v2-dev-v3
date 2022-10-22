<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\ImageProfile;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Auth;

class ChangeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;

        $img = DB::table('image_profile')->where('id_account', $id)->orderBy('id_account', 'desc')->take(1)
        ->get();

        print_r($img);
        // return view('dashboards.admins.profile', compact("img"));
    }

    public function changePhoto(Request $request)
    {

        $id  = $request->get("id");

        $file=$request->file('image');
        $imgFolder = 'img/profileImage';
        $extension = $request->file('image')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);

        $dataEmployee = new ImageProfile;
        $dataEmployee->id_account  = $id;
        $dataEmployee->link  = $imgFile;
        $dataEmployee->save();

        return redirect('/admin/profile');
    }

    public function changePhotoEmployee(Request $request)
    {

        $id  = $request->get("id");

        $file=$request->file('image');
        $imgFolder = 'img/profileImage';
        $extension = $request->file('image')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);

        $dataEmployee = new ImageProfile;
        $dataEmployee->id_account  = $id;
        $dataEmployee->link  = $imgFile;
        $dataEmployee->save();

        return redirect('/employee/profile');
    }
}
