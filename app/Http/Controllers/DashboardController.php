<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\surat_jalan;
use App\pengiriman;
use App\perusahaan;
use App\customer;
use App\penawaran;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $surat_jalan = surat_jalan::with(['customer','perusahaan'])->get();
        $surat_jalan_batal = surat_jalan::where('status','batal')->get();
        $customer = customer::all();
        $perusahaan = perusahaan::all();
        $pengiriman = pengiriman::with('detail_pengiriman.surat_jalan')->get();
        $penawaran = penawaran::all();
        return view('dashboard.index', ['surat_jalan' => $surat_jalan, 'pengiriman' => $pengiriman, 'surat_jalan_batal' => $surat_jalan_batal, 'customer' => $customer, 'perusahaan' => $perusahaan, 'penawaran' => $penawaran, '']);
    }
}
