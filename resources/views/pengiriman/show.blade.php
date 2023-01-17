@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => $pengiriman->nama_pengiriman])

@section('content')


    <div class="row">
      <div class="col-lg-12">
      <div class="card bg-light">
        <div class="row px-3 py-3">
          <div class="col-lg-12">
          <div class="card-body">
            @foreach ($detail_pengiriman as $item)
            <div class="row bg-white rounded">
              <div class="col">
                <b>{{$item->surat_jalan->no_sj}}</b>
                <p class="card-text"> 
                  Customer : {{$item->surat_jalan->customer->nama_customer}} <br>
                  PO : {{$item->surat_jalan->po}} <br>
                  PR : {{$item->surat_jalan->pr}}
                </p>
              </div>
              <div class="col text-right">
                <br>
                <input class="form-check-input" type="checkbox" value="" onclick="selesai('{{$item->surat_jalan->id}}')" @if($item->surat_jalan->tgl_paket != NULL) checked @endif>
              </div>
              <div class="col-lg-12">
                <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama barang</th>
                      <th scope="col">UNIT</th>
                      <th scope="col">QTY</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($item->surat_jalan->detail_surat_jalan as $detail)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{$detail->nama_barang}}</td>
                      <td>{{$detail->unit}}</td>
                      <td>{{$detail->qty}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <br>
            @endforeach
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection

@push('js')
@include('pengiriman._script')
@endpush
