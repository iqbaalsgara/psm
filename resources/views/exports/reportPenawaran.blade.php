<table>
    <tr>
        <td>Tanggal</td>
        <td>No Penawaran</td>
        <td>Customer</td>
        <td>Alamat Pengiriman</td>
        <td>Perusahaan</td>
        <td>Nama Barang</td>
        <td>Unit</td>
        <td>QTY</td>
        <td>Harga</td>
    </tr>
    @foreach ($penawaran as $item)
        @foreach ($item->detail_penawaran as $detail)
            <tr>
                <td>{{$item->created_at}}</td>
                <td>{{$item->no_penawaran_harga}}</td>
                <td>{{$item->customer->nama_customer}}</td>
                <td>{{$item->alamat_delivery}}</td>
                <td>{{$item->perusahaan->nama_perusahaan}}</td>
                <td>{{$detail->nama_barang}}</td>
                <td>{{$detail->unit}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->harga}}</td>
            </tr>
       @endforeach
   @endforeach
</table>