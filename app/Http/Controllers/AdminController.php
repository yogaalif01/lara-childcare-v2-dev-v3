<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Session;
class AdminController extends Controller
{
    function index(){
        $id = Auth::user()->id;

        $img = DB::table('image_profile')->where('id_account', $id)->orderBy('id', 'desc')->take(1)
        ->get();
        return view('dashboards.admins.baru.dashboard', compact('img'));
    }
    public function register()
    {
        $register = DB::table("account")->where("id_role",2)
                    ->join("biodataparent","account.id_account","biodataparent.id_account")
                    ->get();
                
        return view('dashboards.admins.baru.register', compact('register'));
    }
    public function approveregister($email)
    {
        DB::table("account")->where("email",$email)->update([
            "status" => "acc"
        ]);

        return redirect('/admin/register');
    }
    public function tolakapprove($email)
    {
        DB::table("account")->where("email",$email)->update([
            "status" => "ditolak"
        ]);

        return redirect('/admin/register');
    }
    public function absensi()
    {
        $karyawan = DB::table("attendance")
                    ->join("biodataemployee","attendance.id_biodataEmployee","=","biodataemployee.id_biodataEmployee")
                    ->select("biodataemployee.full_name","attendance.*")
                    ->get();
        $anak = DB::table("attendancechild")
                ->join("biodatachild","attendancechild.id_biodataChild","=","biodatachild.id_biodataChild")
                ->get();
        
        return view('dashboards.admins.baru.absensi', compact('karyawan','anak'));
    }
    public function schedule()
    {
        $anak = DB::table("biodatachild")->get();
        $schedule = DB::table("schedulechild")->get();
        return view('dashboards.admins.baru.schedule', compact('anak','schedule'));
    }
    public function child_activity()
    {
        $anak = DB::table("biodatachild")->get();
        $aktivitas = DB::table("childactivity")
                    ->join("biodatachild","childactivity.id_biodataChild","=","biodatachild.id_biodataChild")
                    ->select("biodatachild.full_name","childactivity.*")
                    ->get();
        return view('dashboards.admins.baru.childactivity', compact('anak','aktivitas'));
    }
    public function postaktivitas(Request $req)
    {
        $this->validate($req,[
            'id_biodataChild' => 'required',
            'aktivitas' => 'required',
            'indikator' => 'required',
            'evalution' => 'required',
        ],[
            "required" => "Tidak Boleh kosong"
        ]);

        DB::table('childactivity')->insert([
            "id_biodataChild" => $req->id_biodataChild,
            "activity" => $req->aktivitas,
            "indicator" => $req->indikator,
            "evaluation" => $req->evalution,
            "date" => date('Y-m-d')
        ]);

        Session::flash("Sukses","Data Berahsil Disimpan");
        return redirect('/admin/aktivitas-anak');
    }
    public function postschedule(Request $req)
    {
        $this->validate($req,[
            'tema' => 'required',
            'note' => 'required',
        ],[
            "required" => "Tidak Boleh kosong"
        ]);

        DB::table('schedulechild')->insert([
            "tema" => $req->tema,
            "nama_kegiatan" => $req->note,
            "date" => date('Y-m-d')
        ]);

        Session::flash("Sukses","Data Berahsil Disimpan");
        return redirect('/admin/schedule');
    }


    
       function profile(){
           $id = Auth::user()->id;

            $img = DB::table('image_profile')->where('id_account', $id)->orderBy('id', 'desc')->take(1)
            ->get();

            // print_r($img);
            return view('dashboards.admins.profile', compact("img"));
            // return view('dashboards.admins.profile');
        }
       function settings(){
           return view('dashboards.admins.settings');
       }

       function employee(){
            return view('dashboards.admins.employee');
        }

       function updateInfo(Request $request){
           
               $validator = \Validator::make($request->all(),[
                   'name'=>'required',
                   'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
                   'favoritecolor'=>'required',
               ]);

               if(!$validator->passes()){
                   return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
               }else{
                    $query = User::find(Auth::user()->id)->update([
                         'name'=>$request->name,
                         'email'=>$request->email,
                         'favoriteColor'=>$request->favoritecolor,
                    ]);

                    if(!$query){
                        return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
                    }else{
                        return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
                    }
               }
       }

       function updatePicture(Request $request){
           $path = 'users/images/';
           $file = $request->file('admin_image');
           $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

           //Upload new image
           $upload = $file->move(public_path($path), $new_name);
           
           if( !$upload ){
               return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
           }else{
               //Get Old picture
               $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

               if( $oldPicture != '' ){
                   if( \File::exists(public_path($path.$oldPicture))){
                       \File::delete(public_path($path.$oldPicture));
                   }
               }

               //Update DB
               $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

               if( !$upload ){
                   return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
               }
           }
       }


       function changePassword(Request $request){
           //Validate form
           $validator = \Validator::make($request->all(),[
               'oldpassword'=>[
                   'required', function($attribute, $value, $fail){
                       if( !\Hash::check($value, Auth::user()->password) ){
                           return $fail(__('The current password is incorrect'));
                       }
                   },
                   'min:8',
                   'max:30'
                ],
                'newpassword'=>'required|min:8|max:30',
                'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Enter your current password',
                'oldpassword.min'=>'Old password must have atleast 8 characters',
                'oldpassword.max'=>'Old password must not be greater than 30 characters',
                'newpassword.required'=>'Enter new password',
                'newpassword.min'=>'New password must have atleast 8 characters',
                'newpassword.max'=>'New password must not be greater than 30 characters',
                'cnewpassword.required'=>'ReEnter your new password',
                'cnewpassword.same'=>'New password and Confirm new password must match'
            ]);

           if( !$validator->passes() ){
               return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           }else{
                
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
           }
       }

}
