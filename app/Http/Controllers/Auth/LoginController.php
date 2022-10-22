<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Auth;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
      protected function redirectTo(){
          if( Auth()->user()->role == 1){
              return route('admin.dashboard');
          }
          elseif( Auth()->user() == 3){
              return route('user.dashboard');
          }elseif( Auth()->user() == 2){
            return route('employee.dashboard');
        }
      }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
       $input = $request->all();
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required'
       ]);

       $cekstatus = DB::table("account")->where("status","acc")
                    ->where("email",$request->email)->get();
        $cekdata = DB::table("account")
        ->where("email",$request->email)->first();
       
        if($cekdata == null)
        {
            Session::flash('cekdata','Anda Belum Terdaftar');
            return redirect('http://localhost/lara-childcare-v2-dev-v3/public/login');
        }
        else {
            if ($cekstatus->count() == 0) {
                Session::flash('gagal','Anda Menunggu Terverifikasi');
                return redirect('http://localhost/lara-childcare-v2-dev-v3/public/login');
              }
        }
  
       
       if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])) ){
        session()->put('idAccount', auth()->user()->id);


        if( auth()->user()->role == 1 ){
            return redirect()->route('admin.dashboard');
        }
        elseif( auth()->user()->role == 2 ){

               $namauser = DB::table('account')->where('id_account', auth()->user()->id)->first();
       
                $userId = DB::table('biodataparent')->where('id_account', auth()->user()->id)->first();
                session()->put('idUser', $userId->id_biodataParent);
                session()->put('nama', $namauser->username);
           
                return redirect()->route('user.dashboard');
            
          
        }elseif( auth()->user()->role == 3 ){
            $userId = DB::table('biodataemployee')->where('id_account', auth()->user()->id)->first();
            session()->put('idUser', $userId->id_biodataEmployee);
            return redirect()->route('employee.dashboard');
        }

       }else{
           return redirect()->route('login')->with('error','Email and password are wrong');
       }
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
   
}
