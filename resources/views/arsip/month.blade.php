@extends('layouts.stisla.index', ['title' => 'Arsip', 'page_heading' => 'Bulan'])

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
    @foreach ($surat_jalan as $item)
    <div class="col-lg-3">
    <div class="card">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">{{date('F', mktime(0, 0, 0, $item->month, 10))}}</h5>
          <p class="card-text">Jumlah data :{{$item->data}}</p>
          <a href="/arsip/{{$id}}/{{$year}}/{{$item->month}}/sj" class="btn btn-primary">Semua..</a>
        </div>
        </div>
      </div>
    </div>
    </div>
    @endforeach
    </div>

@endsection
