@extends('layouts.stisla.index', ['title' =>'Penawaran', 'page_heading' => $penawaran->no_penawaran_harga])

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
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#penawaran_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>
    <input type="hidden" name="" id="id_penawaran" value="{{$penawaran->id}}">
    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">Name And Specification</th>
              <th scope="col">Qty</th>
              <th scope="col">Unit</th>
              <th scope="col">Unit Price<br>Currency IDR</th>
              <!--
              <th scope="col">Tgl</th>
              -->
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($detail_penawaran as $item)
            <tr align="center">
              <th scope="row">{{ $loop->iteration }}</th>
              <td align="left">{{ $item->nama_barang }}</td>
              <td align="center">{{ $item->qty }}</td>
              <td align="center">{{ $item->unit}}</td> 
              <td align="right">{{ $item->harga }}</td>
              <!--
              <td>{{ $item->created_at }}</td>
              -->
              <td class="text-center">
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#penawaran_detail_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
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
@include('penawaran.detail.modal.create')
@include('penawaran.detail.modal.edit')
@endpush

@push('js')
@include('penawaran.detail._script')
@endpush