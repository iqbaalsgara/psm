<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PembukuanExport;
use App\Imports\PembukuanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Pembukuan;
use App\surat_jalan;
use App\detail_surat_jalan;
use App\perusahaan;

class PembukuanController extends Controller
{
    //
    public function index()
    {
        // $surat_jalan = surat_jalan::with('perusahaan')->orderBy('created_at', 'asc'->get();
        // return view('pembukuan.index', ['surat_jalan' => $surat_jalan]);
        $perusahaan = perusahaan::all();
        return view('pembukuan.index',['perusahaan' => $perusahaan]);
    }

    public function show($id)
    {
        $surat_jalan = surat_jalan::findOrFail($id);
        $surat_jalan_detail = detail_surat_jalan::where('surat_jalan_id',$id)->get();
        $sum = detail_surat_jalan::where('surat_jalan_id',$id)->sum('harga_asli');
        $count = $surat_jalan_detail->count();
        return view('pembukuan.show', ['surat_jalan' => $surat_jalan, 'surat_jalan_detail' => $surat_jalan_detail], compact('count','sum'));
    }

    public function tampil($id)
    {
        $surat_jalan = surat_jalan::with('detail_surat_jalan')->where('perusahaan_id',$id)->orderBy('created_at','desc')->get();
        $count = 10;
        return view('pembukuan.tampil', ['surat_jalan'=> $surat_jalan], compact('count','id'));
    }

    public function search()
    {
        $no_sj = $_GET['no_sj'];
        $id = $_GET['id'];
        if ($no_sj == '') {
            $surat_jalan = surat_jalan::where('perusahaan_id',$id)->get();
        } else {
            $surat_jalan = surat_jalan::where('perusahaan_id',$id)->where('no_sj',$no_sj)->get();
        }
        $count = 10;
        // return response()->json($surat_jalan, 200);
        return view('pembukuan.tampil', ['surat_jalan'=>$surat_jalan], compact('count','id'));
    }

    public function autocomplete()
    {
        $search = $_GET['search'];
        $id = $_GET['id'];
        if ($search == '') {
            $no_sj = surat_jalan::where('perusahaan_id',$id)->orderBy('no_sj','asc')->select('id','no_sj')->limit(5)->get();
        } else {
            $no_sj = surat_jalan::where('perusahaan_id',$id)->orderBy('no_sj','asc')->select('id','no_sj')->where('no_sj','like','%' . $search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($no_sj as $item){
            $response[] = array("label" => $item->no_sj);
        }
        return response()->json($response);
    }
    
    public function satuan(Request $request,$id)
    {
        $surat_jalan_detail = detail_surat_jalan::findOrFail($id);
        $surat_jalan_detail->harga_asli = str_replace(".","",$request->harga_asli);
        $surat_jalan_detail->deskripsi = $request->deskripsi;
        $surat_jalan_detail->save();
        return response()->json(['success' => 'Pembukuan success'], 200);
    }

    public function selesai(Request $request)
    {
        for ($i=0; $i < count($request->id); $i++) { 
            $surat_jalan_detail = detail_surat_jalan::findOrFail($request->id[$i]);
            $surat_jalan_detail->harga_asli = str_replace(".","",$request->harga_asli[$i]);
            $surat_jalan_detail->deskripsi = $request->deskripsi[$i];
            $surat_jalan_detail->save();
        }
        return redirect()->back()->with(['message' => 'Berhasil', 'alert' => 'success']);
        
    }

    public function pembukuanexport(){
        return Excel::download(new PembukuanExport,'Pembukuan.xlsx');
    }

    //Suscces
    //public function Pembukuanimportexcel(Request $request)
    //{ 
    //    $Pembukuan = Excel::toCollection(new PembukuanImport, $request->file('file'));
    //    foreach ($Pembukuan[0] as $Pembukuan) {
    //        dd($Pembukuan[1].''.$Pembukuan[2]);
    //    }
    //    return redirect()->back();
    //}

    public function Pembukuanimportexcel(Request $request)
    { 
        $Pembukuan = Excel::toCollection(new PembukuanImport, $request->file('file'));
        foreach ($Pembukuan[0] as $Pembukuan) {
            Pembukuan::where('id',$Pembukuan[0])->update([

                'surat_jalan_id' => $Pembukuan[1],
                'user_id'        => $Pembukuan[2],
                'nama_barang'    => $Pembukuan[3],
                'harga_asli'     => $Pembukuan[4],
                'harga_po'       => $Pembukuan[5],
                'tgl_beli'       => $Pembukuan[6],
                'deskripsi'      => $Pembukuan[7],
                'statusitem'     => $Pembukuan[8],
                'unit'           => $Pembukuan[9],
                'qty'            => $Pembukuan[10],
            ]);
        }
        return redirect()->back();
    }
}