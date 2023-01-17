<html>
<head>
    <title>Print Invoice</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">

    <style>
        .mid {
            text-align: center;
            vertical-align: top;
        }

        .leat {
            text-align: center;
            vertical-align: center;
        }

        .leat {
            text-align: left;
            vertical-align: center;
        }
        .reag {
            text-align: right;
            vertical-align: center;
        }

        @page {
            size: letter;
            margin: 0;
        }
        /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .fnt-14{
            font-size: 14px;
        }

        tr > .td-pertama {
            border-left:1px solid;
            border-right: 0;
        }

        tr > .td-semua {
            border-left:1px solid black;
        }

        tr > .barang {
            line-height: 14px;
            height: 14px;
        }

        tr > .td-kedua{
            border-right: 1px solid; 
            border-left: 0;
        }

        tr > .td-ketiga{
            border-right: 1px solid; 
            border-left:1px solid;
        }

        tr > .td-kosong{
            border: 0px !important;
        }

        tr > .td-isi{
            border: 1px solid !important;
        }

        table.table-bordered{
            border:1px solid black;
            margin-top:20px;
            border-collapse: collapse;
        }
        table.table-bordered > thead > tr > td{
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td{
            height:14px;
            border-bottom: 0;
            border-top: 0;
        }
        table.table-bordered > tbody{
            height:586px;
            border:1px solid black;
        }
        table.table-bordered > tbody > tr > td:empty{
            border-top: 0;
        }
        table.table-bordered > tfoot > tr > td{
            border:1px solid black;
        }

    /* table, tr, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        } */

        .fnt-12{
            font-size: 12px;
        }

        .page {
            width: 215.9mm;
            height: 279.4mm;  
            padding: 5mm;
            margin: 5mm auto;
           /* border: 1px  solid;*/
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 279mm;
            outline: 2cm #FFEAEA solid;
        }

        .left {
            width: 60%;
        }

        .right {
            width: 40%;
        }

        .center {
            width: 50%;
        }

        .full {
            width: 100%;
        }

        .col-print-1 {width:8%;  float:left;}
        .col-print-2 {width:16%; float:left;}
        .col-print-3 {width:25%; float:left;}
        .col-print-4 {width:33%; float:left;}
        .col-print-5 {width:42%; float:left;}
        .col-print-6 {width:50%; float:left;}
        .col-print-7 {width:58%; float:left;}
        .col-print-8 {width:66%; float:left;}
        .col-print-9 {width:75%; float:left;}
        .col-print-10{width:83%; float:left;}
        .col-print-11{width:92%; float:left;}
        .col-print-12{width:100%; float:left;}

        
        @page {
            width: 215.9mm;
            height: 279.4mm;     
            margin: 0;
        }
        @media print {
            html, body {
                width: 241.3mm;
                height: 279.4mm;        
            }
            .page {
                width: 241.3mm;
                height: 279.4mm;   
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

            tr > .td-pertama {
                border-left:1px solid !important;
                border-right: 0 !important;
            }

            tr > .td-semua {
                border-left:1px solid black !important;
            }

            tr > .barang {
                line-height: 14px !important;
                height: 14px !important;
            }

            tr > .td-kedua{
                border-right: 1px solid !important; 
                border-left: 0 !important;
            }

            tr > .td-ketiga{
                border-right: 1px solid !important; 
                border-left:1px solid !important;
                border-bottom: 0 !important;
            }

            tr > .td-kosong{
                border: 0px !important;
            }

            tr > .td-isi{
                border: 1px solid !important;
                border-top: 1px solid !important;
                border-bottom: 1px solid !important;
            }

            table.table-bordered{
                border:1px solid black !important;
                margin-top:20px;
            }
            table.table-bordered > thead > tr > td{
                border:1px solid black !important;
            }
            table.table-bordered > tbody > tr > td{
                height:14px !important;
                border-bottom: 0 !important;
                border-top: 0 !important;
            }
            table.table-bordered > tbody{
                border:1px solid black !important;
            }
            table.table-bordered > tbody > tr > td:empty{
                border-top: 0 !important;
                border-bottom: 1px solid black !important;
            }
            table.table-bordered > tfoot > tr > td{
                border-top: 1px solid black !important;
                border:1px solid black !important;
            }

        }
    </style>
    <body>
        <div class="page">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <td colspan="6" height="100">
                            <div class="col-print-6 mid">
                                <h5><b> {{$pt->nama_perusahaan}}</b></h5>
                                <div class="">
                                    {{$pt->alamat_perusahaan}} <br>
                                    Telp: {{$pt->no_telp}} Fax: {{$pt->no_fax}}
                                </div>
                            </div>
                            <div class="col-print-6">
                                <table borde="1" class="table">
                                    <tr>
                                        <td class="mid">
                                            {{date('d M Y', strtotime($sj->tgl_invoice) )}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="mid">
                                            {{$sj->customer->nama_customer}}
                                            <div class="">
                                                <br>
                                                {{$sj->detail_customer->alamat_lengkap}} <br>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="">
                                <div class="col-print-12">INVOICE No : {{$sj->no_inv}} </div>
                                <div class="col-print-12">PO No : {{$sj->po}}</div>
                                <div class="col-print-12">PR No : {{$sj->pr}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:10px" height="14" colspan="2" class="mid">
                            Banyaknya
                        </td>
                        <td class="mid" style="width:500px">
                            Nama Barang
                        </td>
                        <td class="mid" style="width:150px" >
                            Harga
                        </td>
                        <td class="mid" style="width:150px">
                            Total
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $height = 0;
                    $total = 0;
                    ?>
                    @foreach($sj->detail_surat_jalan as $item)
                    <?php
                    $height += 14;
                    ?>
                    <tr>
                        <td class="mid td-pertama barang">
                            {{$item->qty}}
                        </td>
                        <td class="mid td-kedua barang">
                            {{$item->unit}}
                        </td>
                        <td class="td-ketiga barang" align="left">
                            {{$item->nama_barang}}
                        </td>
                        <td class="td-ketiga barang" align="right">
                            {{ number_format(substr($item->harga_po,0, strlen($item->harga_po)),0,",",".")}}
                        </td>
                        <td class="td-ketiga barang" align="right">
                            {{ number_format(substr($item->harga_po,0, strlen($item->harga_po))*$item->qty,0,",",".")}}
                        </td>
                        <?php $total += + substr($item->harga_po,0, strlen($item->harga_po))*$item->qty; ?>
                    </tr>
                    @endforeach
                    <tr height="<?php
                    $td_total =  300 - $height;
                    echo $td_total;
                ?>">
                <td class="td-pertama">
                <td class="td-kedua">
                <td class="td-ketiga">
                <td class="td-ketiga"></td>
                <td class="td-ketiga"></td>
            </tr>

            <tr height="14">
                <td class="td-pertama">
                <td class="td-kedua">
                <td class="td-ketiga">
                <td class="td-isi reag">Total</td>
                <td class="td-isi reag">{{ number_format($total,0,",",".")}}</td>
            </tr>
            <tr height="14">
                <td class="td-pertama">
                <td class="td-kedua">
                <td class="td-ketiga">
                <td class="td-isi reag">PPN 11%</td>
                <td class="td-isi reag">{{ number_format($total * 11 / 100,0,",",".")}}</td>
            </tr>
            <tr height="14">
                <td class="td-pertama">
                <td class="td-kedua">
                <td class="td-ketiga">
                <td class="td-isi reag">Grand Total</td>
                <td class="td-isi reag">{{ number_format($total +=  $total * 11 / 100,0,",",".")}}</td>
                <input type="hidden" name="" value="{{$total}}" id="grand_total">
            </tr>

    <table class="table table-bordered ">
         <tr height="14">
                <td class="td-kosong mid" id="terbilang" colspan="6"></td>
            </tr>
    </table>

            <tr>
                <td colspan="6" height="200">
                    <div class="col-print-6 leat">
                        <br><br><br>
                        Pembayara Ditransfer <br>
                        Ke {{$sj->perusahaan->bank}} <br>
                    </div>
                    <div class="col-print-6 mid">
                        Hormat Kami,

                        <br><br><br><br><br><br><br><br>
                        {{$sj->perusahaan->aninvoice}}
                    </div>
                </td>
            </tr>
        </tbody>
    </table> 
</div>
<script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>
<script>
    function terbilang(bilangan) {

        bilangan    = String(bilangan);
        var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
        var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
        var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

        var panjang_bilangan = bilangan.length;

        /* pengujian panjang bilangan */
        if (panjang_bilangan > 15) {
          kaLimat = "Diluar Batas";
          return kaLimat;
      }

      /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
      for (i = 1; i <= panjang_bilangan; i++) {
          angka[i] = bilangan.substr(-(i),1);
      }

      i = 1;
      j = 0;
      kaLimat = "";


      /* mulai proses iterasi terhadap array angka */
      while (i <= panjang_bilangan) {

          subkaLimat = "";
          kata1 = "";
          kata2 = "";
          kata3 = "";

          /* untuk Ratusan */
          if (angka[i+2] != "0") {
            if (angka[i+2] == "1") {
              kata1 = "Seratus";
          } else {
              kata1 = kata[angka[i+2]] + " Ratus";
          }
      }

      /* untuk Puluhan atau Belasan */
      if (angka[i+1] != "0") {
        if (angka[i+1] == "1") {
          if (angka[i] == "0") {
            kata2 = "Sepuluh";
        } else if (angka[i] == "1") {
            kata2 = "Sebelas";
        } else {
            kata2 = kata[angka[i]] + " Belas";
        }
    } else {
      kata2 = kata[angka[i+1]] + " Puluh";
  }
}

/* untuk Satuan */
if (angka[i] != "0") {
    if (angka[i+1] != "1") {
      kata3 = kata[angka[i]];
  }
}

/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
    subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
}

/* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
kaLimat = subkaLimat + kaLimat;
i = i + 3;
j = j + 1;

}

/* mengganti Satu Ribu jadi Seribu jika diperlukan */
if ((angka[5] == "0") && (angka[6] == "0")) {
  kaLimat = kaLimat.replace("Satu Ribu","Seribu");
}

return kaLimat + "Rupiah";
}
$('#terbilang').html(terbilang($('#grand_total').val()));
</script>
</body>
</head>
</html>