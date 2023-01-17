<html>
<head>
<title>Penawaran {{$penawaran->no_penawaran_harga}}</title>
<link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
<style>
    .mid {
        text-align: center;
        vertical-align: top;
    }

    .leap {
        text-align: center;
        vertical-align: center;
    }


    .laep {
        text-align: left;
        vertical-align: top;
    }

    .lep {
        text-align: right;
        vertical-align: bottom;
    }


    @page {
    size: A4;
    margin: 0;
    }
    /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font-family:  consolas , sans-serif;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .fnt-14{
        font-size: 14px;
    }

    .fnt-12{
        font-size: 12px;
    }

    .img-stempel {
        position: absolute;
        z-index: 1;
       }

    .img-ttd {
        position: relative;
        z-index: 2;
       }

    table .table-bordered > tr > td {
             border: 1px  solid black;
         }

    .page {
        width: 241.3mm;
        /* height: 279.4mm;*/  
        padding: 5mm;
        margin: 5mm auto;
        /* border: 1px  solid;*/
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        outline: 2cm white solid;
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

    .flt-right {
        float: right;
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

    #customers {
    font-family: Arial, Verdana, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }


    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    font-size: 12px;
    text-align: left;
    background-color: black;
    color: white;
    }

    #table_total #kiri {
        background-color: #404040;color:white;text-align:right;
    }

    hr {
        border-top: 2px solid black; margin-top:5px;width:110%;margin-left:-15px;
    }



    @page {
        size: A4;
        margin: 0;
    }

    @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
        /* ... the rest of the rules ... */
        }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

    @media print {
    tr.vendor {
        background-color: black !important;
        -webkit-print-color-adjust: exact;
        }
    }

    @media print {
        .vendor th {
            color: white !important;
        }
    }

    @media print {
    td#kiri {
        background-color: #404040 !important;
        -webkit-print-color-adjust: exact;
        }
    }

    @media print {
        hr {
        border-top: 2px solid black; margin-top:5px;width:110%;margin-left:-15px;
         }
    }

    @media print {
        .page .subpage {
        margin-bottom: 60px;
         }

         table .table-bordered > tr > td {
             border: 1px  solid black !important;
         }
    }

    @media print {
        pre {
            border: none;
        }
    }
</style>
<body>
<div class="page">
    <div class="subpage">
        <div class="row">
            <div class="col-print-12 mid">
            <?php  
                $pathstempel = Storage::url($penawaran->perusahaan->stempel);  
                $pathkop = Storage::url($penawaran->perusahaan->kop_surat); 
 
            ?>
            <img src="{{url($pathkop)}}" width="850px" height="150px"  alt="Kop Surat {{$penawaran->perusahaan->kop_surat}}">
            </div>
            <div class="col-print-12">
                <hr border="2">
            </div>
            <div class="col-print-12 mid">
                <b>PENAWARAN HARGA</b><br>
                {{$penawaran->no_penawaran_harga}}
            </div>
            <div class="col-print-10">
                <!--
                {{$penawaran->perusahaan->kecamatan}}, {{$penawaran->created_at->isoFormat('D MMMM Y')}}<br>
            -->
                {{$penawaran->perusahaan->kecamatan}}, {{date('d M Y', strtotime($penawaran->tgl) )}}<br>
                Kepada Yth. <br>
                <b>{{$penawaran->customer->nama_customer}}</b> <br>

                {{$penawaran->detail_customer->alamat_lengkap}}<br>
                Attn: {{$penawaran->attn}} <br>
            </div>
            <div class="col-print-8">

            </div>
            <div class="col-print-10">
            Bersama ini kami mengajukan penawaran harga untuk item-item sesuai dengan 
            Permintaan sebagai berikut:
            </div>
            <div class="col-print-2">

            </div>
            <div class="col-print-12">
                <table class="table table-bordered" >
                    <thead>
                        <tr align="center">
                            <th width="5%">NO</th>
                            <th width="30%">NAMA BARANG</th>
                            <th width="10%">UOM</th>
                            <th width="5%">QTY</th>
                            <th width="15%">PRICE@</th>
                            <th width="15%">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach($penawaran->detail_penawaran as $detail)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td>{{$detail->nama_barang}}</td>
                                <td align="center">{{$detail->unit}}</td>
                                <td align="center">{{number_format($detail->qty)}}</td>
                                <td align="right">{{number_format($detail->harga)}}</td>
                                <td align="right">{{number_format($detail->harga*$detail->qty)}}</td>
                            </tr>
                            <?php $total +=  $detail->harga*$detail->qty; ?>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-print-12">
                <table class="" >
                    <thead>
                        <tr>
                            <th width="50%"></th>
                            <th width=""></th>
                            <th width=""></th>
                            <th width="50%"></th>
                            <th width="40%"></th>
                            <th width="25%"></th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Delivery : {{$penawaran->delivery}}</td>
                                <td></td>
                                <td></td>
                                <td align="right">
                                    Sub Total<br>
                                    Ppn 11%<br>
                                    Grand Total
                                </td>
                                <td align="right">
                                    &nbsp;Rp.<br>
                                    &nbsp;Rp.<br>
                                    &nbsp;Rp.
                                </td>
                                <td align="right">
                                    {{number_format($total)}}<br>
                                    {{number_format($total * 11 / 100)}}<br>
                                    {{number_format($total += $total * 11 / 100)}}

                                </td>
                            </tr>
                    </tbody>
                </table>

<!--                    
                    <tr>
                        <td>Delivery</td>
                        <td>: {{$penawaran->delivery}}</td>
                    </tr>
-->
                    <tr>
                        <td>Keterangan</td>
                        <td>: {{$penawaran->keterangan}}</td>
                    </tr>



<!--            <div class="col-print-8"></div>
            <div class="col-print-4">
                <table>
                    <tr>
                        <td>Total</td>
                        <td>: Rp. {{number_format($total)}}</td>
                    </tr>
                </table>
            </div>
-->
 
<!--            <div class="col-print-4">
                <table>
                    <tr>
                        <td width="55%">Sub Total</td>
                        <td>Rp. {{number_format($total)}}</td>
                    </tr>
                    <tr>
                        <td>Ppn 11%</td>
                        <td>Rp. {{number_format($total * 11 / 100)}}</td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>Rp. {{number_format($total += $total * 11 / 100)}}</td>
                    </tr>
                </table>
            </div>
-->
            <div class="col-print-12">
                <br>
            </div>
            <div class="col-print-12">
                Demikian penawaran harga dari kami, atas perhatian dan kerjasamanya kami sampaikan terimakasih.
            </div>
            <div class="col-print-4 mid">
                Hormat Kami,
                <br>
                <img class="img-ttd" src="{{url($pathstempel)}}" width="200px" height="150px"  alt="Stempel {{$penawaran->perusahaan->stempel}}">
                <br>
                {{ $penawaran->nambutpenawaran }}
            </div>
        </div>
    </div>
</div>
</body>
</head>
</html>
