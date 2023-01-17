<html>
<head>
<title>Print Surat Jalan</title>
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

    .{
        font-size: 12px;
    }

    .page {
        width: 215.9mm;
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

        tr > .td-kedua{
            border-right: 1px solid !important; 
            border-left: 0 !important;
        }

        tr > .td-ketiga{
            border-right: 1px solid !important; 
            border-left:1px solid !important;
        }

        tr > .barang {
            line-height: 14px;
            height: 14px;
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
                    <td colspan="3" height="150">
                        <div class="col-print-6 mid">
                            <h5><b>{{$pt->nama_perusahaan}}</b></h5>
                            <div class="">
                            {{$pt->alamat_perusahaan}} <br>
                            Telp: {{$pt->no_telp}} Fax: {{$pt->no_fax}}
                            </div>
                        </div>
                        <div class="col-print-6 mid">
                            Kepada :<br>
                            {{$sj->customer->nama_customer}} <br>
                            <br>
                            {{$sj->detail_customer->alamat_lengkap}} <br>
                            </div>
                        </div>
                        <div class="col-print-12"><br><br></div>
                        <div class="">
                        <div class="col-print-5">SURAT JALAN No : {{$sj->no_sj}} </div>
                        <div class="col-print-12">PO No : {{$sj->po}}</div>
                        <div class="col-print-12">PR No : {{$sj->pr}}</div>
                        <div class="col-print-12">Kami Kirimkan Barang-Barang Tersebut dibawah ini dengan Kendaraan: ............... No ...............</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width:150px" height="14" colspan="2" class="mid">
                        Banyaknya
                    </td>
                    <td class="mid">
                        Nama Barang
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $height = 0;
                ?>
                    @foreach($sj->detail_surat_jalan as $item)
                    <?php
                        $height += 14;
                    ?>
                    <tr>
                        <td style="width:75px;"  class="mid td-pertama barang">
                            {{$item->qty}}
                        </td>
                        <td style="width:75px;" class="mid td-kedua barang">
                            {{$item->unit}}
                        </td>
                        <td class="td-ketiga barang">
                            {{$item->nama_barang}}
                        </td>
                    </tr>
                    @endforeach
                    <tr height="<?php
                     //$total =  586 - $height;//
                     $total =  500 - $height;
                     echo $total;
                     ?>">
                        <td class="td-pertama"></td>
                        <td class="td-kedua"></td>
                        <td class="td-ketiga"></td>
                    </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" height="200">
                        <div class="col-print-6 mid">
                            Tanda Terima
                        </div>
                        <div class="col-print-6 mid">
                            Hormat Kami,
                        </div>
                    </td>
                </tr> 
            </tfoot>
        </table>
</div>
</body>
</head>
</html>