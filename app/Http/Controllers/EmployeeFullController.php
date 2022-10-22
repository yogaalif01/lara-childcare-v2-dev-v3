<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;
use Session;

class EmployeeFullController extends Controller
{
    function index(){

        return view('dashboards.employees.baru.dashboard');
       }
       public function absen()
       {
            $id = Auth::user()->id;
            
            $employe = DB::table('biodataemployee')->where("id_account",$id)->first();
            $cekabsen = DB::table('attendance')->where("id_biodataEmployee",$employe->id_biodataEmployee)
                        ->where("date",date('Y-m-d'))->first();
            
            $cek = strtotime("16:30:00") - strtotime($cekabsen->time);

    

            if ($cekabsen == null) {
                DB::table("attendance")->insert([
                    "id_biodataEmployee" => $employe->id_biodataEmployee,
                    "date"   => date('Y-m-d'),
                    "time" => date('h:i'),
                    "status" => "Hadir"
                ]);
                Session::flash('sukses','Anda sudah Absen');
            }
            else {
                Session::flash('Gagal','Anda Sudah Absen Hari Ini');
            }

         
            return redirect('/employee/attendance');
       }
    
       function profile(){
            $id = Auth::user()->id;

            $img = DB::table('image_profile')->where('id_account', $id)->orderBy('id', 'desc')->take(1)
            ->get();

            // print_r($img);
            return view('dashboards.employees.profile', compact("img"));
       }
       function settings(){
           return view('dashboards.employees.settings');
       }

       function employee(){
            return view('dashboards.employees.employee');
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
