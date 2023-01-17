@extends('layouts.stisla.index', ['title' => 'Perusahaan', 'page_heading' => 'Perusahaan'])

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
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#perusahaan_create_modal">
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
            <tr align="center">
              <th scope="col">No</th>
              <th scope="col">Nama Perusahaan</th>
              <th scope="col">Singkatan</th>
              <th scope="col">No Telp</th>
              <th scope="col">Fax</th>
              <th scope="col">Alamat Lengkap</th>
              <th scope="col">Bank</th>
              <th scope="col">A.n. Invoice</th>
              <th scope="col">Provinsi</th>
              <th scope="col">Kota</th>
              <th scope="col">Kecamatan</th>
              <!--
              <th scope="col">Logo</th>
               -->
              <th scope="col">Stempel</th>
              <th scope="col">Kop Surat</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($perusahaan as $item)
            <?php 
            $path = Storage::url($item->logo); 
            $pathstempel = Storage::url($item->stempel);  
            $pathkop = Storage::url($item->kop_surat); 
            ?>
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->nama_perusahaan }}</td>
              <td>{{ $item->singkatan }}</td>
              <td>{{ $item->no_telp }}</td>
              <td>{{ $item->no_fax }}</td>
              <td>{{ $item->alamat_perusahaan }}</td>
              <td>{{ $item->bank }}</td>
              <td>{{ $item->aninvoice }}</td>
              <td>{{ $item->provinsi}}</td>
              <td>{{ $item->kota}}</td>
              <td>{{ $item->kecamatan}}</td>
              <!--
              <td><img src="{{url($path)}}" width="100px" alt="Logo {{$item->logo}}"></td>
              -->
              <td><img src="{{url($pathstempel)}}" width="100px" alt="Stempel {{$item->stempel}}"></td>
              <td><img src="{{url($pathkop)}}" width="100px" alt="Kop Surat {{$item->kop_surat}}"></td>

              <td class="text-center">
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#perusahaan_edit_modal" data-placement="top" title="Ubah data">
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
@include('perusahaan.modal.create')
@include('perusahaan.modal.edit')
@endpush

@push('js')
@include('perusahaan._script')
@endpush