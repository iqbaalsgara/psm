@extends('layouts.stisla.index', ['title' => 'Format Nomor', 'page_heading' => 'Format Nomor'])

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
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#format_nomor_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>

    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Format</th>
              <th scope="col">Surat Jalan</th>
              <th scope="col">Invoice</th>
              <th scope="col">Penawaran</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($format_nomor as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->nama_format }}</td>
              <td>{{ $item->surat_jalan }}</td>
              <td>{{ $item->invoice }}</td>
              <td>{{ $item->penawaran }}</td>
              <td class="text-center">
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#format_nomor_edit_modal" data-placement="top" title="Ubah data">
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
@include('format_nomor.modal.create')
@include('format_nomor.modal.edit')
@endpush

@push('js')
@include('format_nomor._script')
@endpush