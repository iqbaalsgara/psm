@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => 'Pembelian Barang'])

@section('content')

<div class="card">
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">No Surat Jalan</th>
              <th scope="col">Customer</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($surat_jalan as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->no_sj }}</td>
              <td>{{ $item->customer->nama_customer }}</td>
              <!--
              <td class="text-center">
                <a href="" style="width: 100%;" class="btn btn-primary">100%</a>
              -->
              <td class="text-center">
                <a href="/pembelian/{{$item->id}}" style="width: 100%;" class="btn btn-primary">{{ $item->no_sj }}</a>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
