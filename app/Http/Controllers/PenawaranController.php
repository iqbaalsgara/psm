<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\penawaran;
use App\detail_penawaran;
use App\perusahaan;
use App\customer;

use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PenawaranController extends Controller
{
    //
    public function index()
    {
        $penawaran = penawaran::orderBy('created_at','desc')->get();
        $penawaran_count = $penawaran->count();
        $customer = customer::all();
        $perusahaan = perusahaan::all();
        return view('penawaran.index', ['penawaran' => $penawaran, 'customers' => $customer, 'perusahaans' => $perusahaan]);
    }

    public function cari($pt,$barang)
    {
       if ($barang != "null") {
        $penawaran = DB::table('penawaran')
                    ->join('detail_penawaran', 'detail_penawaran.penawaran_id', '=', 'penawaran.id')
                    ->where('penawaran.perusahaan_id', '=', $pt)
                    ->where('detail_penawaran.nama_barang','like','%' . $barang . '%')
                    ->get();
        $ptn = perusahaan::find($pt);
        $nama_pt = $ptn->nama_perusahaan;
        $penawaran_count = $penawaran->count();
        $customer = customer::all();
        $perusahaan = perusahaan::all();
        return view('penawaran.cari', ['penawaran' => $penawaran,'barang' => $barang,'pt' => $nama_pt, 'customers' => $customer, 'perusahaans' => $perusahaan]);
       } else {
        $penawaran = DB::table('penawaran')
                ->join('detail_penawaran', 'detail_penawaran.penawaran_id', '=', 'penawaran.id')
                ->where('penawaran.perusahaan_id', '=', $pt)
                ->get();
        $ptn = perusahaan::find($pt);
        $nama_pt = $ptn->nama_perusahaan;
        $penawaran_count = $penawaran->count();
        $customer = customer::all();
        $perusahaan = perusahaan::all();
        return view('penawaran.cari', ['penawaran' => $penawaran,'barang' => $barang,'pt' => $nama_pt, 'customers' => $customer, 'perusahaans' => $perusahaan]);
       }
    }

    public function show($id)
    {
        $penawaran = penawaran::findOrFail($id);
        $date = date('Y-m-d\TH:i:s', strtotime($penawaran->tgl));
        return response()->json(['success' => 'get penawaran by id', 'data' => $penawaran, 'tgl' => $date], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'detail_customer_id' => 'required',
            'attn' => 'required',
            'perusahaan_id' => 'required',
            'no_penawaran_harga' => 'required',
            //'alamat_delivery' => 'required',
            'keterangan' => 'required',
            'nambutpenawaran' => 'required',
            'delivery' => 'required',
            'nama_barang' => 'required|array',
            'harga' => 'required|array',
            'unit' => 'required|array',
            'qty' => 'required|array',
            'nama_barang.*' => 'required',
            'harga.*' => 'required',
            'unit.*' => 'required',
            'qty.*' => 'required',
            'tgl.*' => 'tgl',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error', 'data' => $validator->errors()], 404);
        }

        $penawaran = penawaran::create([
            'perusahaan_id' => $request->perusahaan_id,
            'customer_id' => $request->customer_id,
            'detail_customer_id' => $request->detail_customer_id,
            'attn' => $request->attn,
            'no_penawaran_harga' => $request->no_penawaran_harga,
            'tgl' => $request->tgl,
            //'alamat_delivery' => $request->alamat_delivery,
            'keterangan' => $request->keterangan,
            'nambutpenawaran' => $request->nambutpenawaran,
            'delivery' => $request->delivery,
        ]);

        for ($i=0; $i < count($request->nama_barang); $i++) { 
            detail_penawaran::create([
                'penawaran_id' => $penawaran->id,
                'nama_barang' => str_replace(".","",$request->nama_barang[$i]),
                'harga' =>  str_replace(".",'',$request->harga[$i]),
                'unit' => $request->unit[$i],
                'qty' => $request->qty[$i],
                // 'diskon' => 0,
            ]);
        }

        return response()->json(['success' => 'Penawaran successfully created'], 200);
    }

    public function update(Request $request, $id)
    {
        $penawaran = penawaran::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'detail_customer_id' => 'required',
            'attn' => 'required',
            'perusahaan_id' => 'required',
            'no_penawaran_harga' => 'required',
            //'alamat_delivery' => 'required',
            'keterangan' => 'required',
            'nambutpenawaran' => 'required',
            'delivery' => 'required',
            'tgl' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error', 'data' => $validator->errors()], 404);
        }

        $penawaran->perusahaan_id = $request->perusahaan_id;
        $penawaran->customer_id = $request->customer_id;
        $penawaran->detail_customer_id = $request->detail_customer_id;
        $penawaran->no_penawaran_harga = $request->no_penawaran_harga;
        //$penawaran->alamat_delivery = $request->alamat_delivery;
        $penawaran->keterangan = $request->keterangan;
        $penawaran->nambutpenawaran = $request->nambutpenawaran;
        $penawaran->tgl = $request->tgl;
        $penawaran->delivery = $request->delivery;
        $penawaran->save();

        return response()->json(['success' => 'Penawaran successfully update'], 200);
    }

    public function print($id)
    {
        $penawaran = penawaran::findOrFail($id);
        return view('penawaran.print', ['penawaran' => $penawaran]);
    }

    public function delete(Request $request,$id)
    {
        $penawaran = penawaran::find($id);

        $detail_penawaran = detail_penawaran::where('penawaran_id', $id)->get();
        foreach ($detail_penawaran as $key ) {
            $detail = detail_penawaran::find($key->id);
            $detail->delete();
        }

        $penawaran->delete();
        return response()->json(['success' => 'Penawaran successfully delete'], 200);
    }

    public function perusahaan($id)
    {
        $perusahaan = perusahaan::find($id);
        $penawaran = penawaran::where('perusahaan_id',$id)->get();
        $penawaran_count = $penawaran->count() + 1;
        
        return response()->json(['success' => 'get count success', 'data' => $perusahaan, 'penawaran_count' => $penawaran_count], 200);
    }

    public function detail($id)
    {
        $detail_penawaran = detail_penawaran::where('penawaran_id', $id)->get();
        return response()->json(['success' => 'Detail penawaran get by penawaran id', 'data' => $detail_penawaran], 200);
    }

    public function detailAll($id)
    {
        $penawaran = penawaran::findOrFail($id);
        $detail_penawaran = detail_penawaran::where('penawaran_id', $id)->orderBy('created_at','DESC')->get();
        return view('penawaran.detail.index', ['penawaran' => $penawaran, 'detail_penawaran' => $detail_penawaran]);
    }

    public function detailShow($id)
    {
        $detail_penawaran = detail_penawaran::findOrFail($id);
        return response()->json(['success' => 'get detail penawaran by id', 'data' => $detail_penawaran], 200);
    }

    public function detailCreate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|array',
            'harga' => 'required|array',
            'unit' => 'required|array',
            'qty' => 'required|array',
            'nama_barang.*' => 'required',
            'harga.*' => 'required',
            'unit.*' => 'required',
            'qty.*' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error', 'data' => $validator->errors()], 404);
        }

        for ($i=0; $i < count($request->nama_barang); $i++) { 
            detail_penawaran::create([
                'penawaran_id' => $id,
                'nama_barang' => $request->nama_barang[$i],
                'harga' => str_replace(".",'',$request->harga[$i]),
                'unit' => $request->unit[$i],
                'qty' => $request->qty[$i],
                // 'diskon' => 0,
            ]);
        }

        return response()->json(['success' => 'Detail penawaran successfully created'], 200);
    }

    public function detailUpdate(Request $request,$id)
    {
        $detail_penawaran = detail_penawaran::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'unit' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error', 'data' => $validator->errors()], 404);
        }

        $detail_penawaran->nama_barang = $request->nama_barang;
        $detail_penawaran->harga = str_replace(".","",$request->harga);
        $detail_penawaran->unit = $request->unit;
        $detail_penawaran->qty = $request->qty;
        $detail_penawaran->save();

        return response()->json(['success' => 'detail penawaran successfully updated'], 200);
    }

    public function detailDelete(Request $request, $id,$id2)
    {
        $detail_penawaran = detail_penawaran::findOrFail($id2);
        $detail_penawaran->delete();

        return response()->json(['success' => 'detail penawaran successfully deleted'], 200);
    }

    public function autocomplete()
    {
        $search = $_GET['search'];
        if ($search == '') {
            $namabarang = detail_penawaran::orderby('nama_barang','asc')->select('id','nama_barang')->limit(5)->get();;
        } else {
            $namabarang = detail_penawaran::orderby('nama_barang','asc')->select('id','nama_barang')->where('nama_barang','like','%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($namabarang as $item){
            $response[] = array("label"=>$item->nama_barang);
        }
        return response()->json($response);
    }
}
