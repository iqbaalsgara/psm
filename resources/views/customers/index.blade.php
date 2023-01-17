@extends('layouts.stisla.index', ['title' => 'Customers', 'page_heading' => 'Customers'])

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
              <th scope="col">Nama Customer</th>
              <th scope="col">No Telp</th>
              <th scope="col">Fax</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($customers as $customer)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $customer->nama_customer }}</td>
              <td>{{ $customer->no_telp }}</td>
              <td>{{ $customer->no_fax }}</td>
              <td class="text-center">
                <a data-id="{{ $customer->id }}" class="btn btn-sm btn-info text-white detail_modal" data-toggle="modal" data-target="#detail_modal">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $customer->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#customer_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $customer->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('customers.modal.create')
@include('customers.modal.detail')
@include('customers.modal.edit')
@endpush

@push('js')
@include('customers._script')
@endpush