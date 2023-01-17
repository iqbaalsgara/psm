

@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => $surat_jalan->no_sj])

@section('content')


    <div class="row">
      <div class="col-lg-12">
      <div class="card bg-light">
        <div class="row px-3 py-3">
          <div class="col-lg-12">
          <div class="card-body">
            @foreach ($surat_jalan_detail as $item)
            <div class="row bg-white rounded">
              <div class="col">
                <b>{{$item->nama_barang}}</b>
                <p class="card-text"> {{$item->qty}} {{$item->unit}}</p>
              </div>
              <div class="col text-right">
                <br>
                <input class="form-check-input" type="checkbox" value="" onclick="terbeli('{{$item->id}}')" @if($item->tgl_beli != NULL) checked @endif>
              </div>
            </div>
            <br>
            @endforeach
            <button class="btn btn-primary float-right" data-id="{{$surat_jalan->id}}" id="selesai">Selesai</button>
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection

@push('js')
@include('pembelian._script')
@endpush
