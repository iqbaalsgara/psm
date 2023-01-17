@extends('layouts.stisla.index', ['title' => 'Detail Customer', 'page_heading' => 'Detail Customer'])

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
<input type="hidden" name="" id="id_customer" value="{{$id}}">
<div class="card">
  <div class="row">
    <div class="col-lg-12">
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#customer_create_modal">
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
              <th scope="col">Alamat Lengkap</th>
              <th scope="col">Daerah</th>
              <th scope="col">Provinsi</th>
              <th scope="col">Kota</th>
              <th scope="col">Kecamata</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($detail_customers as $detail_customer)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $detail_customer->alamat_lengkap }}</td>
              <td>{{ $detail_customer->alamat_daerah }}</td>
              <td>{{ $detail_customer->provinsi }}</td>
              <td>{{ $detail_customer->kota }}</td>
              <td>{{ $detail_customer->kecamatan }}</td>
              <td class="text-left">
                <a data-id="{{ $detail_customer->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#detail_customer_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $detail_customer->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('customers.detail.modal.create')
@include('customers.detail.modal.edit')
@endpush

@push('js')
@include('customers.detail._script')
@endpush