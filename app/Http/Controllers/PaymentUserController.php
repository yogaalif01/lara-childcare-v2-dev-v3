<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BiodataEmployee;
use App\Models\RegisterChild;
use App\Models\Transaction;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use Auth;

class PaymentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $_GET["id"];

        $payment = DB::table('transaction')->where('status', "Make Payment")
        ->join('biodatachild', 'transaction.id_biodataChild', '=', 'biodatachild.id_biodataChild')
        ->join('biodataparent', 'biodatachild.id_biodataParent', '=', 'biodataparent.id_biodataParent')
        ->where("id_transaction", $id)
        ->get(["id_transaction", "biodatachild.full_name", "biodatachild.id_biodataChild", "biodataparent.father_name", "biodataparent.mother_name", "nominal", "link_transfer"]);
        
        return view('dashboards.users.payment', compact("payment"));

    }

    public function uploadTf(Request $request)
    {

        $idTrans  = $request->get("id");

        // $data = new Transaction;
        // $data->id_biodataChild = $request->get("id_child");
        // $data->date = $date;
        // $data->nominal = 200000;
        // $data->link_transfer = "-";
        // $data->status = "Make Payment";
        // $data->packet = "2 weeks";
        // $data->save();

        DB::table('transaction')
                ->where('id_transaction', $idTrans)
                ->update(['status' => 'Validation']);

        // if (!$request->has('image')) {
        //     return response()->json(['message' => 'Missing file'], 422);
        // }
        // $file = $request->file('image');
        // $name = Str::random(10);
        // $url = Storage::putFileAs('images', $file, $name . '.' . $file->extension());
        // $extension = Input::file('image')->getClientOriginalExtension();

        
        //File Sertifikat
        $file=$request->file('image');
        $imgFolder = 'img/trans';
        $extension = $request->file('image')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);

        

        DB::table('transaction')
                ->where('id_transaction', $idTrans)
                ->update(['status' => 'Validation']);

        DB::table('transaction')
            ->where('id_transaction', $idTrans)
            ->update(['link_transfer' => $imgFile]);

        // $validatedData = $request->validate([
        // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        // ]);
        // $file = $request->file('file');
        // $name = $file->getClientOriginalName();
        // print_r($name);

        // $path = $request->file('image')->store('public/img');

        return redirect('/user/registerChild');
    }
}
