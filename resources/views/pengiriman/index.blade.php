@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => 'Pembelian Barang'])

@section('content')


    @if ($message = Session::get('message'))
          <div class="alert alert-{{Session::get('alert')}} alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
          </div>
    @endif

    <div class="row">
      @foreach ($pengiriman as $item)
      <div class="col-lg-12">
      <div class="card">
        <div class="row px-3 py-3">
          <div class="col-lg-12">
          <div class="card-body">
            <h5 class="card-title">{{$item->nama_pengiriman}}</h5>
            @if ($item->tgl_pengiriman === NULL)
            <a href="/pengiriman/{{$item->id}}/kirim" class="btn btn-success" id="kirim">Kirim</a>
            @endif
            <a href="/pengiriman/{{$item->id}}" class="btn btn-primary">Detail</a>
            <a href="/pengiriman/{{$item->id}}/hapus" class="btn btn-danger">Hapus</a>
          </div>
          </div>
        </div>
      </div>
      </div>
      @endforeach
    </div>

@endsection
