<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Account;
use App\Models\BiodataParent;
use App\Models\UserAccount;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use DB;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'role'=>2,
    //         'favoriteColor'=>$data['favoriteColor'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    function register(Request $request){

         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);

        

         $email = $request->email;

         $account = new Account();
         $account->id_role = 2;
         $account->email = $request->email;
         $account->username = $request->username;
         $account->password = Hash::make($request->password);
         $account->kategori = $request->kategori;
         $account->status = "belum acc";

        //  $user->picture = $picture;

         if( $account->save()){

            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->role = 2;
            $user->password = Hash::make($request->password);
            $user->save();

            $userId = DB::table('account')->where('email', $email)->first();

            $biodata = new BiodataParent();
            $biodata->id_account = $userId->id_account;
            if ($request->kategori == "ayah") {
                $biodata->father_name = $request->username;
            }
            if ($request->kategori == "ibu") {
                $biodata->mother_name = $request->username;
            }
            if ($request->kategori == "wali") {
                $biodata->mother_name = $request->username;
            }

            // if ($request->kategorilayanan == "hari") {
            //     $biodata->paket_layanan =  $request->kategorilayanan.",".$request->layanan1;
            // }
            // if ($request->kategorilayanan == "minggu") {
            //     $biodata->paket_layanan =  $request->kategorilayanan.",".$request->layanan2;
            // }
            // if ($request->kategorilayanan == "bulan") {
            //     $biodata->paket_layanan =  $request->kategorilayanan.",".$request->layanan3;
            // }
           
            // $biodata->address = $request->address;
            // $biodata->phone_number = $request->phone_number;
            // $biodata->office_address = $request->office_address;
            // $biodata->office_phone_number = $request->office_phone_number;
            $biodata->save();

            // $biodatayah = DB::table("biodataparent")->where("father_name",$request->username)->first();

            // DB::table("biodatachild")->insert([
            //     "id_biodataParent" => $biodatayah->id_biodataParent,
            //     "full_name" => $request->namaanak
            // ]);
            
            Session::flash('sukses','Anda Sudah Daftar Menunggu Di verifikasi');
            return redirect()->route('login');
         }
         else{
             return redirect()->back()->with('error','Failed to register');
         }

    }


}
