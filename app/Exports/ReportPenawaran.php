<?php

namespace App\Exports;

use App\surat_jalan;
use App\penawaran;
use App\detail_surat_jalan;
use App\pengiriman;
use App\perusahaan;
use App\customer;
use App\detail_pengiriman;
use App\detail_penawaran;
use App\detail_customer;
use App\User;

use DB;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportPenawaran implements FromView
{
    protected $tgl_awal,$tgl_akhir;

    public function __construct($tgl_awal,$tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }

  public function view() :View
  {
      $penawaran = penawaran::with('detail_penawaran')->with('perusahaan')->with('customer')->whereBetween('created_at', [$this->tgl_awal,$this->tgl_akhir])->get();
      return view('exports.reportPenawaran', ['penawaran' => $penawaran]);
  }
}
