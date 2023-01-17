<table>
    <tr>
        <td>Perusahaan</td>
        <td>Customer</td>
        <td>PO</td>
        <td>PR</td>
        <td>Surat Jalan</td>
        <td>Nama Barang</td>
        <td>QTY</td>
        <td>Unit</td>
        <td>Harga PO</td>
        <td>Harga Beli</td>
        <td>Status</td>
        <td>Invoice</td>  
    </tr>
    @foreach ($surat_jalan as $item)
        @foreach ($item->detail_surat_jalan as $detail)
            <tr>
                <td>{{$item->perusahaan->nama_perusahaan}}</td>
                <td>{{$item->customer->nama_customer}}</td>
                <td>{{$item->po}}</td>
                <td>{{$item->pr}}</td>
                <td>{{$item->no_sj}}</td>
                <td>{{$detail->nama_barang}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->unit}}</td>
                <td>{{$detail->harga_po}}</td>
                <td>{{$detail->harga_asli}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->tgl_invoice}}</td>
            </tr>
       @endforeach
   @endforeach
</table>


<!--

<table>
    <tr>
        <td>Tanggal</td>
        <td>Surat Jalan</td>
        <td>PO</td>
        <td>PR</td>
        <td>Customer</td>
        <td>Perusahaan</td>
        <td>Status</td>
        <td>Tanggal Pengiriman</td>
        <td>No Invoice</td>
        <td>Partial</td>
        <td>Nama Barang</td>
        <td>Unit</td>
        <td>QTY</td>
        <td>Harga Jual</td>
        <td>Harga Beli</td>
    </tr>
    @foreach ($surat_jalan as $item)
        @foreach ($item->detail_surat_jalan as $detail)
            <tr>
                <td>{{$item->tgl_input}}</td>
                <td>{{$item->no_sj}}</td>
                <td>{{$item->po}}</td>
                <td>{{$item->pr}}</td>
                <td>{{$item->customer->nama_customer}}</td>
                <td>{{$item->perusahaan->nama_perusahaan}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->tgl_pengiriman}}</td>
                <td>{{$item->no_inv}}</td>
                <td>{{$item->partial}}</td>
                <td>{{$detail->nama_barang}}</td>
                <td>{{$detail->unit}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->harga_asli}}</td>
                <td>{{$detail->harga_po}}</td>
            </tr>
       @endforeach
   @endforeach
</table>

-->