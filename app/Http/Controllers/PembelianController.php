<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\surat_jalan;

use App\detail_surat_jalan;

class PembelianController extends Controller
{
    //
    public function index()
    {
        $surat_jalan = surat_jalan::with('customer')->where('status','!=','arsip')->where('status','!=','batal')->orderBy('created_at', 'desc')->get();
        return view('pembelian.index', ['surat_jalan' => $surat_jalan]);
    }

    public function show($id)
    {
        $surat_jalan = surat_jalan::findOrFail($id);
        $surat_jalan_detail = detail_surat_jalan::where('surat_jalan_id',$id)->get();
        return view('pembelian.show', ['surat_jalan' => $surat_jalan, 'surat_jalan_detail' => $surat_jalan_detail]);
    }

    //--------------------------------------------------------------------------------
    
    public function satuan(Request $request,$id)
    {
        $surat_jalan_detail = detail_surat_jalan::findOrFail($id);
        if ($surat_jalan_detail->tgl_beli == null) {
            $surat_jalan_detail->tgl_beli = date("Y-m-d\TH:i:s");
            $surat_jalan_detail->statusitem = 'Terbeli';
            $surat_jalan_detail->save();
        } else {
            $surat_jalan_detail->tgl_beli = null;
            $surat_jalan_detail->statusitem = 'Menunggu';
            $surat_jalan_detail->save();
        }
        return response()->json(['success' => 'Pembelian success'], 200);
    }

    public function selesai($id)
    {
        $surat_jalan = surat_jalan::findOrFail($id);
        if ($surat_jalan->tgl_pembelian == null) {
            $surat_jalan->tgl_pembelian = date("Y-m-d\TH:i:s");
            $surat_jalan->status = 'Terbeli';
            $surat_jalan->save();
        } else {
            $surat_jalan->tgl_pembelian = null;
            $surat_jalan->status = 'Menunggu';
            $surat_jalan->save();
        }
        return response()->json(['success' => 'status updated'], 200);
    }

    //--------------------------------------------------------------------------------
}
