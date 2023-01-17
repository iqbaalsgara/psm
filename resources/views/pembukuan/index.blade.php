@extends('layouts.stisla.index', ['title' => 'Pembukuan', 'page_heading' => 'Pembukuan'])

@section('content')

    @if ($message = Session::get('message'))
          <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
          </div>
    @endif

    <div class="row">
    @foreach ($perusahaan as $item)
    <div class="col-lg-6">
    <div class="card">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">{{$item->singkatan}}</h5>
          <p class="card-text">{{$item->nama_perusahaan}}</p>
          <a href="/pembukuan/{{$item->id}}" class="btn btn-primary">Detail</a>
        </div>
        </div>
      </div>
    </div>
    </div>
    @endforeach
    </div>

@endsection
