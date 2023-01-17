<table>
    <tr>
        <td>Perusahaan</td>
        <td>Customer</td>
        <td>PO</td>
        <td>PR</td>
        <td>Invoice</td>
        <td>Nama Barang</td>
        <td>QTY</td>
        <td>Unit</td>
        <td>Harga PO</td>
        <td>Harga Beli</td>
        <td>Status</td>
        <td>Bulan</td>  
    </tr>
    @foreach ($surat_jalan as $item)
        @foreach ($item->detail_surat_jalan as $detail)
            <tr>
                <td>{{$item->perusahaan->nama_perusahaan}}</td>
                <td>{{$item->customer->nama_customer}}</td>
                <td>{{$item->po}}</td>
                <td>{{$item->pr}}</td>
                <td>{{$item->no_inv}}</td>
                <td>{{$detail->nama_barang}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->unit}}</td>
                <td>{{$detail->harga_po}}</td>
                <td>{{$detail->harga_asli}}</td>
                <td>{{$item->status}}</td>
                <td>{{date('d M Y', strtotime($item->tgl_invoice) )}}</td>
            </tr>
       @endforeach
   @endforeach
</table>
