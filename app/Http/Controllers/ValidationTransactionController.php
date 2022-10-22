<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\RegisterChild;
use App\Models\WaitingList;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;

class ValidationTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaction = DB::table('transaction')->where('status', "Validation")
        ->join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->join("paket","transaction.idpaket","paket.idpaket")
        ->get();
    
        $transactionDone = DB::table('transaction')->where('status', "Success")
        ->join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->join("paket","transaction.idpaket","paket.idpaket")
        ->get();

        $transactionDitolak = DB::table('transaction')->where('status', "Ditolak")
        ->join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->join("paket","transaction.idpaket","paket.idpaket")
        ->get();
        // print_r($transaction);
        return view('dashboards.admins.baru.transaksi', compact("transaction", "transactionDone","transactionDitolak"));
    }
    public function buktitf()
    {
        $transactionDone = DB::table('transaction')->where('status', "Success")
        ->join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->join("paket","transaction.idpaket","paket.idpaket")
        ->get();
     

        return view('dashboards.admins.baru.buktitf', compact("transactionDone"));
    }
    public function updatepembayaran($id)
    {
        DB::table('transaction')->where("id_transaction",$id)->update([
            
        ]);
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

    public function Approve(Request $request)
    {
        $date = date('Y-m-d');

        $waitinglist = new WaitingList;
        $waitinglist->id_biodataChild  = $request->get("idchild");
        $waitinglist->date = $date;
        $waitinglist->status = "Pending";
        $waitinglist->save();

        DB::table('transaction')
                ->where('id_transaction', $request->get("idtrans"))
                ->update(['status' => 'Success']);

        return redirect('/admin/transaction');
    }
    public function tolak(Request $request)
    {
        

        DB::table('transaction')
                ->where('id_transaction', $request->get("idtrans"))
                ->update(['status' => 'Ditolak']);

        return redirect('/admin/transaction');
    }
}
