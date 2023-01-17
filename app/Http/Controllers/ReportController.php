<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\surat_jalan;
use App\penawaran;
use App\paja;
use App\detail_surat_jalan;
use App\pengiriman;
use App\perusahaan;
use App\customer;
use App\detail_pengiriman;
use App\detail_penawaran;
use App\detail_customer;
use App\User;

use App\Exports\ReportSuratJalan;
use App\Exports\ReportPajak;
use App\Exports\ReportPenawaran;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    //

    public function index()
    {
        return view('report.index');
    }

    public function tarik_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid validation'], 404);
        }

        if ($request->type == 'surat_jalan') {
            return Excel::download(new ReportSuratJalan(
                $request->tanggal_awal,
                $request->tanggal_akhir),'Report Transaksi '.$request->tanggal_awal.'-'.$request->tanggal_akhir.'.xlsx');

        } elseif ($request->type == 'penawaran') {
            return Excel::download(new ReportPenawaran(
                $request->tanggal_awal,
                $request->tanggal_akhir),'Report Transaksi '.$request->tanggal_awal.'-'.$request->tanggal_akhir.'.xlsx');

        } else {
            return Excel::download(new ReportPajak(
                $request->tanggal_awal,
                $request->tanggal_akhir),'Report Transaksi '.$request->tanggal_awal.'-'.$request->tanggal_akhir.'.xlsx');
        } 
    }
}