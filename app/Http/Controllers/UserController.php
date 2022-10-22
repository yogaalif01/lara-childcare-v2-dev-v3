<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;

class UserController extends Controller
{
   function index(){
    return view('dashboards.users.baru.index');
   }
   function profile(){
        $id = Auth::user()->id;

        $img = DB::table('image_profile')->where('id', $id)->orderBy('id_account', 'desc')->take(1)
        ->get();
        $cekbioparent = DB::table("biodataparent")
                        ->join("account","biodataparent.id_account","=","account.id_account")
                        ->where("biodataparent.id_account",$id)->first();
        $cekpaket = DB::table('transaction')
                    ->join("biodatachild","transaction.id_biodataChild","=","biodatachild.id_biodataChild")
                    ->join("paket","transaction.idpaket","paket.idpaket")
                    ->select("paket.nama_paket","transaction.keterangan_paket")
                    ->where("biodatachild.id_biodataParent",$cekbioparent->id_biodataParent)
                    ->get();
                

        // print_r($img);
        return view('dashboards.users.admin.index', compact("img","cekbioparent","cekpaket"));
   }
   public function daftaranak()
   {
         $id = Auth::user()->id;
         $cekbioparent = DB::table("biodataparent")->where("id_account",$id)->first();
 
         $cekanak =  DB::table("biodatachild")
                     ->join("transaction","biodatachild.id_biodataChild","=","transaction.id_biodataChild")
                     ->join("paket","transaction.idpaket","=","paket.idpaket")
                     ->where("id_biodataParent",$cekbioparent->id_biodataParent)->get();
       
         return view('dashboards.users.admin.dataanakdaftar', compact('cekanak'));
   }
   public function absen()
   {
        $id = Auth::user()->id;
        $cekbioparent = DB::table("biodataparent")->where("id_account",$id)->first();
       $anak = DB::table('biodatachild')->where("id_biodataParent",$cekbioparent->id_biodataParent)->get();
       $anak1 = DB::table('biodatachild')->where("id_biodataParent",$cekbioparent->id_biodataParent)->first();
       $absen_anak = DB::table("attendancechild")
                    ->join("biodatachild","attendancechild.id_biodataChild","=","biodatachild.id_biodataChild")
                    ->where("attendancechild.id_biodataChild",$anak1->id_biodataChild)->get();
           
       return view('dashboards.users.admin.attendance', compact('anak','absen_anak'));
   }
   public function postabsen(Request $req)
   {
        
        $this->validate($req,[
            'id_biodataChild' => 'required',
            'jam_datang' => 'required',
            'jam_pulang' => 'required',
            'pengantar' => 'required',
            'jemput' => 'required',
            'keterangan' => 'required',
        ]);

       $cekabsen = DB::table('attendancechild')
                ->where("id_biodataChild",$req->id_biodataChild)
                ->where("date",date("Y-m-d"))->first();

        if ($cekabsen == null) {
            DB::table('attendancechild')->insert([
                "id_biodataChild" => $req->id_biodataChild,
                "date"   => date("Y-m-d"),
                "jam_datang" => $req->jam_datang,
                "jam_pulang" => $req->jam_pulang,
                "pengantar" => $req->pengantar,
                "penjemput" => $req->jemput,
                "keterangan" => $req->keterangan,
            ]);
            Session::flash('sukses','Anda Berhasil Absen');
        }
        else {
            Session::flash('gagal','Anda sudah Absen');
        }

     
    
       return redirect('/user/attendance_child');
   }
   public function editanak($id)
   {
       $data = DB::table("biodatachild")
                    ->join("childimprovement","biodatachild.id_biodataChild","=","childimprovement.id_biodataChild")
                    ->join("dailyhabits","biodatachild.id_biodataChild","=","dailyhabits.id_biodataChild")
                    ->select("biodatachild.*","childimprovement.*","dailyhabits.*")
                    ->where("biodatachild.id_biodataChild",$id)->first();


       return view('dashboards.users.admin.editanak', compact('data'));
   }
   public function updateanak($id,Request $req)
   {
          DB::table("biodatachild")->where("id_biodataChild",$id)->update([
            "full_name" => $req->full_name,
            "nickname" => $req->nickname,
            "brith_date" => $req->brith_date,
            "brith_place" => $req->brith_place,
            "gender" => $req->gender,
            "child_siblings" => $req->child_siblings,
            "child_siblings_of" => $req->child_siblings_of,
            "child_outside_activity" => $req->child_outside_activity,
            "religion" => $req->religion,
          ]);

          DB::table("childimprovement")->where("id_biodataChild",$id)->update([
            "prenatal" => $req->prenatal,
            "partus" => $req->partus,
            "post_natal" => $req->post_natal,
            "motoric_skill" => $req->motoric_skill,
            "language_skill" => $req->language_skill,
            "health_history" => $req->health_history,
          ]);

          DB::table("dailyhabits")->where("id_biodataChild",$id)->update([
            "bak" => $req->bak,
            "bab" => $req->bab,
            "toothBrush" => $req->toothBrush,
            "eat" => $req->eat,
            "drinkingMilk" => $req->drinkingMilk,
            "crying" => $req->crying,
            "play" => $req->play,
            "sleep" => $req->sleep,
            "etc" => $req->etc,
          ]);


          Session::flash('sukses','Data Berhasil Disimpan');
          return redirect('/user/daftaranak');
   }

   public function transaksianak()
   {
         $id = Auth::user()->id;
        $cekbioparent = DB::table("biodataparent")->where("id_account",$id)->first();

        $data = DB::table('transaction')
                ->join("biodatachild","transaction.id_biodataChild","=","biodatachild.id_biodataChild")
                ->join("paket","transaction.idpaket","=","paket.idpaket")
                ->select("transaction.*","biodatachild.*","paket.*")
                ->where("biodatachild.id_biodataParent",$cekbioparent->id_biodataParent)->get();

     return view('dashboards.users.admin.transaksi', compact('data'));
   }
   public function uploadbuktiTF($id, Request $req)
   {
        $file = $req->file('foto');
        $imagename = $file->getClientOriginalName();
        $file->move(base_path() ."/public/img/trans",$imagename );



       DB::table('transaction')->where("id_transaction",$id)->update([
           "link_transfer" => $imagename,
           "atas_nama"  => $req->atas_nama,
           "nama_bank" => $req->nama_bank
       ]);
   }

   function settings(){
       return view('dashboards.users.settings');
   }
   function cctv(){
    return view('dashboards.users.cctv');
}
public function logout1()
    {
        Session::flush();
        return redirect('/login');
    }
}
