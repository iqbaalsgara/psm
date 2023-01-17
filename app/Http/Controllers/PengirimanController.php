<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\pengiriman;
use App\detail_pengiriman;
use App\surat_jalan;
use App\detail_surat_jalan;

class PengirimanController extends Controller
{
    //
    public function index()
    {
        $pengiriman = pengiriman::orderBy('created_at','desc')->get();
        return view('pengiriman.index', ['pengiriman' => $pengiriman]);
    }

    public function show($id)
    {
        $pengiriman = pengiriman::findOrFail($id);
        $detail_pengiriman = detail_pengiriman::with(['surat_jalan.detail_surat_jalan' => function($q){
            $q->where('detail_surat_jalan.tgl_beli','!=',null);
        }])->where('pengiriman_id',$id)->get();
        return view('pengiriman.show', ['detail_pengiriman' => $detail_pengiriman, 'id_pengiriman' => $id, 'pengiriman' => $pengiriman]);
    }


    //--------------------------------------------------------------------------------

    public function satuan(Request $request,$id)
    {
        $surat_jalan = surat_jalan::findOrFail($id);
        if ($surat_jalan->tgl_paket == null) {
            $surat_jalan->tgl_paket = date("Y-m-d\TH:i:s");
            $surat_jalan->status = 'Terkirim';
            $surat_jalan->save();
        } else {
            $surat_jalan->tgl_paket = null;
            $surat_jalan->status = 'Terbeli';
            $surat_jalan->save();
        }

        return response()->json(['success' => 'Berhasil di ubah'], 200);
    }

    public function kirim($id)
    {
        $pengiriman = pengiriman::findOrFail($id);
        $detail_pengiriman = detail_pengiriman::where('pengiriman_id',$id)->get();
        foreach ($detail_pengiriman as $key ) {
            $id_sj = $key->surat_jalan_id;
            $sj = surat_jalan::find($id_sj);
            if ($sj->tgl_paket == null) {
                return redirect()->back()->with(['message' => 'Centang seluruh surat jalan', 'alert' => 'warning']);
            } else {
                $sj->tgl_pengiriman = date("Y-m-d\TH:i:s");
                $sj->save();
            }
        }

        $pengiriman->tgl_pengiriman = date("Y-m-d\TH:i:s");
        $pengiriman->save();

        return redirect()->back()->with(['message' => 'Terkirim', 'alert' => 'success']);
    }
    //--------------------------------------------------------------------------------



        public function hapus($id)
    {
        $pengiriman = pengiriman::findOrFail($id);

        $detail_pengiriman = detail_pengiriman::where('pengiriman_id',$id)->get();
        foreach ($detail_pengiriman as $key ) {
            $id_sj = $key->surat_jalan_id;
            $sj = surat_jalan::find($id_sj);
            $sj->tgl_pengiriman = null;
            $sj->tgl_paket = null;
            $sj->tgl_invoice = null;
            $sj->save();
            $det = detail_pengiriman::find($key->id);
            $det->delete();
        }

        $pengiriman->delete();
        return redirect()->back()->with(['message' => 'Terhapus', 'alert' => 'success']);
    }

}
