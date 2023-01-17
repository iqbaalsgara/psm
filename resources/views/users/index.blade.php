@extends('layouts.stisla.index', ['title' => 'Account', 'page_heading' => 'Account'])

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
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#user_create_modal">
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
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Status</th>
              <th scope="col">TTD</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($users as $user)
            <?php $path = Storage::url($user->ttd); ?>
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->role_id }}</td>
              <td>{{ $user->status}}</td>
              <td>
              <img src="{{url($path)}}" width="100px" alt="TTD {{$user->ttd}}">
              </td>
              <td class="text-center">
                <a data-id="{{ $user->id }}" class="btn btn-sm btn-info text-white active_modal" data-toggle="modal" data-target="#active_modal">
                  <i class="fas fa-fw fa-power-off"></i>
                </a>
                <a data-id="{{ $user->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#user_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $user->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
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
@include('users.modal.create')
@include('users.modal.active')
@include('users.modal.edit')
@endpush

@push('js')
@include('users._script')
@endpush