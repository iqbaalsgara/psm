<?php

namespace App\Http\Controllers;

use PDF;

use App\customer;
use Carbon\Carbon;
use App\pengiriman;
use App\perusahaan;
use App\surat_jalan;
use App\detail_customer;
use App\detail_pengiriman;
use App\detail_surat_jalan;
use App\format_nomor;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Input;

class SuratJalanController extends Controller
{
    //
    public function index()
    {
        $perusahaan = perusahaan::orderBy('created_at', 'desc')->get();
        return view('surat_jalan.index', ['perusahaan' => $perusahaan]); 
    }

    public function perusahaan($id)
    {
        $year = date('Y');
        $surat_jalan = surat_jalan::with('customer')->where('perusahaan_id', $id)->where('status', '!=', 'arsip')->orderBy('created_at', 'desc')->get();
        $sj_year = surat_jalan::where('perusahaan_id',$id)->whereYear('created_at','=', $year)->get();
        $customer = customer::all();
        $perusahaan = perusahaan::find($id);
        $surat_jalan_count = $sj_year->count();
        $singkatan = $perusahaan->singkatan;

        return view('surat_jalan.perusahaan',['perusahaan' => $perusahaan, 'customers' => $customer, 'surat_jalan' => $surat_jalan], compact('surat_jalan_count','singkatan'));
    }

    public function show($id, $id2)
    {
        $surat_jalan = surat_jalan::findOrFail($id2);

        return response()->json(['success' => 'get surat jalan successfully', 'data' => $surat_jalan], 200);
    }

    public function create(Request $request, $id)
    {
        $perusahaan = perusahaan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'detail_customer_id' => 'required',
            'no_sj' => 'required',
            'po' => 'required',
            'pr' => 'required',
            'partial' => 'required',
            'note' => 'required',
            'nama_barang' => 'required|array',
            'harga_po' => 'required|array',
            'unit' => 'required|array',
            'qty' => 'required|array',
            'nama_barang.*' => 'required',
            'harga_po.*' => 'required',
            'unit.*' => 'required',
            'qty.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error', 'data' => $validator->errors()], 404);
        }

        $sj = surat_jalan::create([
            'perusahaan_id' => $id,
            'customer_id' => $request->customer_id,
            'detail_customer_id' => $request->detail_customer_id,
            'user_id' => Auth::id(),
            'no_sj' => $request->no_sj,
            'po' => $request->po,
            'pr' => $request->pr,
            'status' => 'Menunggu',
            'tgl_input' => date("Y-m-d\TH:i:s"),
            'partial' => $request->partial,
            'note' => $request->note,
        ]);

        for ($i=0; $i < count($request->nama_barang); $i++) { 
            detail_surat_jalan::create([
                'surat_jalan_id' => $sj->id,
                'nama_barang' => $request->nama_barang[$i],
                'harga_po' => str_replace(".",'',$request->harga_po[$i]),
                'unit' => $request->unit[$i],
                'qty' => $request->qty[$i],
                'harga_asli' => 0,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $perusahaan = perusahaan::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'detail_customer_id' => 'required',
            'no_sj' => 'required',
            'po' => 'required',
            'pr' => 'required',
            'partial' => 'required',
            'note' => 'required',
            'tgl_invoice' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error'], 404);
        }

        $surat_jalan = surat_jalan::findOrFail($request->id);
        $surat_jalan->customer_id = $request->customer_id;
        $surat_jalan->detail_customer_id = $request->detail_customer_id;
        $surat_jalan->no_sj = $request->no_sj;
        $surat_jalan->po = $request->po;
        $surat_jalan->pr = $request->pr;
        $surat_jalan->partial = $request->partial;
        $surat_jalan->note = $request->note;
        $surat_jalan->tgl_invoice = $request->tgl_invoice;
        $surat_jalan->save();

        return response()->json(['success' => 'surat jalan successfully updated'], 200);
    }

    public function delete(Request $request, $id, $id2)
    {
        $surat_jalan = surat_jalan::findOrFail($id2);
        $surat_jalan->status = 'Batal';
        $surat_jalan->save();

        return response()->json(['success' => 'surat jalan successfully deleted'], 200);
    }

    public function check(Request $request, $id, $id2)
    {
        $surat_jalan = surat_jalan::findOrFail($id2);
        $perusahaan = perusahaan::find($surat_jalan->perusahaan_id);
        $surat_jalan->tgl_invoice = $surat_jalan->tgl_pembelian;
        $surat_jalan->status = 'Invoice';


        $no_inv = substr($surat_jalan->no_sj, 0, strpos($surat_jalan->no_sj, '/'));
        $bulan = $surat_jalan->created_at->format('m');
        $year = $surat_jalan->created_at->format('Y');
        $surat_jalan->no_inv = $no_inv.'/INV/'.$perusahaan->singkatan.'/'.$bulan.'/'.$year;

        $surat_jalan->save();
        return response()->json(['success' => 'surat jalan successfully updated'], 200);
    }
    
    public function filter($id,$param,$param2)
    {
        $surat_jalan = surat_jalan::where('perusahaan_id',$id)->where($param,$param2)->get();
        $surat_jalan_count = $surat_jalan->count();
        if ($surat_jalan_count > 1) {
            return response()->json(['error' => 'telah digunakan'], 404);
        } else {
            return response()->json(['success' => 'bisa digunakan'], 200);
        }
    }

    public function detail($id)
    {
        $detail_surat_jalan = detail_surat_jalan::where('surat_jalan_id', $id)->get();
        return response()->json(['success' => 'get detail surat jalan', 'data' => $detail_surat_jalan], 200);   
    }

    public function detailAll($id)
    {
        $surat_jalan = surat_jalan::findOrFail($id);
        $detail_surat_jalan = detail_surat_jalan::where('surat_jalan_id', $id)->get();
        return view('surat_jalan.detail.index', ['surat_jalan' => $surat_jalan, 'detail_surat_jalan' => $detail_surat_jalan]);
    }

    public function detailShow($id, $id2)
    {
        $detail_surat_jalan = detail_surat_jalan::findOrFail($id2);
        return response()->json(['success' => 'detail surat jalan successfully get', 'data' => $detail_surat_jalan], 200);
    }

    public function detailCreate(Request $request,$id)
    {
       $surat_jalan = surat_jalan::findOrFail($id);
       $validator = Validator::make($request->all(), [
           'nama_barang' => 'required',
           'harga_po' => 'required',
           'unit' => 'required',
           'qty' => 'required'
       ]);

       if ($validator->fails()) {
           return response()->json(['error' => 'Validation Error'], 404);
       }

       for ($i=0; $i < count($request->nama_barang); $i++) { 
        detail_surat_jalan::create([
            'surat_jalan_id' => $id,
            'nama_barang' => $request->nama_barang[$i],
            'harga_po' => str_replace(".",'',$request->harga_po[$i]),
            'unit' => $request->unit[$i],
            'qty' => $request->qty[$i],
            'harga_asli' => 0,
        ]);
    }
    return response()->json(['success' => 'detail surat jalan detail successfully created'], 200);
}

public function detailUpdate(Request $request, $id)
{
    $detail_surat_jalan = detail_surat_jalan::findOrFail($request->id);
    $validator = Validator::make($request->all(), [
        'nama_barang' => 'required',
        'harga_po' => 'required',
        'unit' => 'required',
        'qty' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'validation error'], 404);
    }

    $detail_surat_jalan->nama_barang = $request->nama_barang;
    $detail_surat_jalan->harga_po = str_replace(".","",$request->harga_po);
    $detail_surat_jalan->unit = $request->unit;
    $detail_surat_jalan->qty = $request->qty;
    $detail_surat_jalan->save();

    return response()->json(['success' => 'detail_surat_jalan  successfully updated'], 200);
}

public function detailDelete(Request $request, $id, $id2)
{
    $detail_surat_jalan = detail_surat_jalan::findOrFail($id2);
    $detail_surat_jalan->delete();
    return response()->json(['success' => 'detail surat jalan deleted successfully deleted'], 200);
}

public function fillter($id,$param1,$param2)
{
    if ($param1 == 'po') {
        $data = surat_jalan::where('perusahaan_id',$id)->where('po',$param2)->get();
        if ($data->count() > 0) {
            return response()->json(['success' => 'successfully po filter', 'text' => 'PO not available', 'class' => 'text-danger','param1' => $param1, 'param2' => $param2], 200);
        } else {
            return response()->json(['success' => 'successfully po filter', 'text' => 'PO available', 'class' => 'text-success','param1' => $param1, 'param2' => $param2], 200);
        }
    } else if ($param1 == 'pr') {
        $data = surat_jalan::where('perusahaan_id',$id)->where('pr',$param2)->get();
        if ($data->count() > 0) {
            return response()->json(['success' => 'successfully PR filter', 'text' => 'PR not available', 'class' => 'text-danger','param1' => $param1, 'param2' => $param2], 200);
        } else {
            return response()->json(['success' => 'successfully PR filter', 'text' => 'PR available', 'class' => 'text-success','param1' => $param1, 'param2' => $param2], 200);
        }
    } else {
        return response()->json(['error' => 'ERR Request'], 404);
    }
}

public function customer($id1,$id2)
{
    $detail_customer = detail_customer::where('customer_id',$id2)->get();
    return response()->json(['success' => 'successfully get customer', 'data' => $detail_customer], 200);
}

public function print($id,$id2)
{
    $perusahaan = perusahaan::find($id);
    $surat_jalan = surat_jalan::find($id2);
    return view('surat_jalan.print', ['pt' => $perusahaan, 'sj' => $surat_jalan]);
}

public function printInvoice(Request $request, $id, $id2)
{
    $perusahaan = perusahaan::find($id);
    $surat_jalan = surat_jalan::find($id2);
    $surat_jalan->status = 'Batal';
    return view('surat_jalan.printInvoice', ['pt' => $perusahaan, 'sj' => $surat_jalan]);
}

public function jadwal($id,$id2)
{
    $surat_jalan = surat_jalan::where('customer_id',$id2)->where('perusahaan_id' ,$id)->where('tgl_paket',null)->get();
    return response()->json(['success' => 'get surat jalan by customer id and company id', 'data' => $surat_jalan], 200);
}


public function buat_jadwal(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama_pengiriman' => 'required',
        'surat_jalan' => 'required',
        'surat_jalan.*' => 'required',
    ]);

    if ($validator->fails()){
        return redirect()->back()->with(['message' => 'Validasi gagal']);
    }

    $pengiriman = pengiriman::create([
        'nama_pengiriman' => $request->nama_pengiriman,
        'user_id' => Auth::id(),
    ]);

    for ($i=0; $i < count($request->surat_jalan); $i++) { 
        detail_pengiriman::create([
            'pengiriman_id' => $pengiriman->id,
            'surat_jalan_id' => $request->surat_jalan[$i],
        ]);
    }
    return redirect()->back()->with(['message' => 'Jadwal dibuat']);
}

public function autocomplete()
{
    $search = $_GET['search'];
    if ($search == '') {
        $namabarang = detail_surat_jalan::orderby('nama_barang','asc')->select('id','nama_barang')->limit(5)->get();;
    } else {
        $namabarang = detail_surat_jalan::orderby('nama_barang','asc')->select('id','nama_barang')->where('nama_barang','like','%' . $search . '%')->limit(5)->get();
    }
    $response = array();
    foreach($namabarang as $item){
        $response[] = array("label"=>$item->nama_barang);
    }
    return response()->json($response);
}

public function arsip(Request $request)
{
    $surat_jalan = surat_jalan::findOrFail($request->id);
    $surat_jalan->status = 'arsip';
    $surat_jalan->tgl_arsip =  date("Y-m-d\TH:i:s");
    $surat_jalan->save();
    return response()->json(['success' => 'surat jalan status successfully updated'], 200);
}

public function arsipIndex()
{
    $perusahaan = perusahaan::orderBy('created_at', 'desc')->get();
    return view('arsip.index', ['perusahaan' => $perusahaan]); 
}

public function arsipIndexYear($id)
{
    $surat_jalan = DB::table('surat_jalan')
    ->select(DB::raw('YEAR(created_at) as year'), DB::raw('count(id) as data'))
    ->groupBy('year')
    ->where('perusahaan_id',$id)
    ->where('status','arsip')
    ->orderBy('created_at', 'desc')
    ->get();
    return view('arsip.year', ['surat_jalan' => $surat_jalan, 'id' => $id]);
}

public function arsipIndexMonth($id,$year)
{
    $surat_jalan = DB::table('surat_jalan')
    ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(id) as data'))
    ->groupBy('month')
    ->where('perusahaan_id',$id)
    ->where('status','arsip')
    ->orderBy('created_at', 'desc')
    ->get();
    return view('arsip.month', ['surat_jalan' => $surat_jalan, 'id' => $id,'year' => $year]);
}

public function arsipIndexAll($id,$year,$month)
{
    $surat_jalan = surat_jalan::whereYear('created_at','=',$year)->whereMonth('created_at','=',$month)->where('perusahaan_id',$id)->where('status','arsip')->get();
    return view('arsip.all', ['surat_jalan' => $surat_jalan,'year' => $year,'month' => $month]);
}

public function arsipKembalikan(Request $request)
{
    $surat_jalan = surat_jalan::findOrFail($request->id);
    $surat_jalan->status = 'success';
    $surat_jalan->tgl_arsip = null;
    $surat_jalan->save();
    return response()->json(['success' => 'surat jalan successfully updated'], 200);
}
}
