@extends('layouts.stisla.index', ['title' =>'Penawaran', 'page_heading' => 'Cari Penawaran'])

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

<div class="card">
  <div class="row  px-3">
    <div class="col-lg-12">
      <br>
    </div>
    <div class="col-lg-4">
      <select name="" id="barang_pt" class="form-control">
        @foreach($perusahaans as $item)
          <option value="{{$item->id}}">{{$item->nama_perusahaan}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-lg-4">
     <input type="text" id="barang_cari" class="form-control" placeholder="Cari Barang">
    </div>
    <div class="col-lg-2">
    <button class="btn btn-success" id="barang_button">
        <i class="fa fa-search"></i>
      </button>
    </div>
    <div class="col-lg-2">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#penawaran_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>
    </div>
    <div class="col-lg-12">
      <i>Hasil pencarian nama barang: <b>{{$barang}}</b> di PT : <b> {{$pt}}</b></i>
    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">No Penawaran</th>
              <th scope="col">Attn</th>
              <th scope="col">TGL</th>
              <th scope="col">Alamat Delivery</th>
              <th scope="col">Delivery</th>
              <th scope="col">Aksi</th>
              <th scope="col">Print</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($penawaran as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><a href="/penawaran/{{$item->id}}/detailAll">{{ $item->no_penawaran_harga }}</a></td>
              <td>{{ $item->attn }}</td>
              <td>{{ $item->tgl}}</td>
              <td>{{ $item->alamat_delivery}}</td>
              <td>{{ $item->delivery}}</td>
              <td class="text-center">
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white detail-button" data-toggle="modal" data-placement="top" title="Detail" data-target="#penawaran_detail_modal">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-warning text-white swal-edit-button" data-toggle="modal" data-target="#penawaran_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
              </td>
              <td>
              <a href="/penawaran/{{ $item->id }}/print" data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white" data-toggle="tooltip" data-placement="bottom" title="Print Penawaran">
                  <i class="fas fa-fw fa-print"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('penawaran.modal.create')
@include('penawaran.modal.edit')
@include('penawaran.modal.detail')
@endpush

@push('js')
@include('penawaran._script')
@endpush