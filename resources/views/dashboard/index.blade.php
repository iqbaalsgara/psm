@extends('layouts.stisla.index', ['title' => 'Dashboard', 'page_heading' => 'Halaman Dashboard'])

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

        <div class="col-lg-6">
    <div class="card bg-primary text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">Perusahaan</h5>
          <p class="card-text">Total : {{$perusahaan->count()}}</p>
        </div>
        </div>
      </div>
    </div>
    </div>

        <div class="col-lg-6">
    <div class="card bg-primary text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">Customer</h5>
          <p class="card-text">Total : {{$customer->count()}}</p>
        </div>
        </div>
      </div>
    </div>
    </div>

    <div class="col-lg-4">
    <div class="card bg-primary text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">PO Masuk</h5>
          <p class="card-text">Total : {{$surat_jalan->count()}}</p>
        </div>
        </div>
      </div>
    </div>
    </div>

        <div class="col-lg-4">
    <div class="card bg-primary text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">Penawaran</h5>
          <p class="card-text">Total : {{$penawaran->count()}}</p>
        </div>
        </div>
      </div>
    </div>
    </div>

            <div class="col-lg-4">
    <div class="card bg-primary text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">...</h5>
          <p class="card-text">Total : </p>
        </div>
        </div>
      </div>
    </div>
    </div>
<!--
    <div class="col-lg-4">
    <div class="card bg-danger text-white">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
        <div class="card-body">
          <h5 class="card-title">Surat jalan dibatalkan</h5>
          <p class="card-text">Total: {{$surat_jalan_batal->count()}}</p>
        </div>
        </div>
      </div>
    </div>
    </div>
-->


    </div>
@endsection
