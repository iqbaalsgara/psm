@extends('layouts.stisla.index', ['title' =>'Perusahaan', 'page_heading' => $surat_jalan->no_sj])

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
      @if($surat_jalan->status != 'arsip')
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#surat_jalan_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>
      @endif
    <input type="hidden" name="" id="id_surat_jalan" value="{{$surat_jalan->id}}">
    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">
          <thead>
            <tr align="center">
              <th scope="col">Item No.</th>
              <th scope="col">Name And Specification</th>
              <th scope="col">Unit Price<br>Currency IDR</th>
              <!--<th scope="col">Buy Price</th>-->
              <th scope="col">Purchase Date</th>
              <th scope="col">Qty</th>
              <th scope="col">Unit</th>
              <!--<th scope="col">Deskripsi</th>-->
              <th scope="col">Input Date</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($detail_surat_jalan as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->nama_barang }}</td>
              <td align="right">{{$item->harga_po}}</td>
              <!--<td align="right">{{ $item->harga_asli }}</td>-->
              <td align="center">{{ $item->tgl_beli}}</td>
              <td align="center">{{ $item->qty }}</td>
              <td align="center">{{ $item->unit}}</td>
              <!--<td>{{ $item->deskripsi}}</td>-->
              <td align="center">{{ $item->created_at }}</td>
              <td class="text-left">
                @if ($surat_jalan->status != 'arsip')
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-success text-white swal-edit-button" data-toggle="modal" data-target="#surat_jalan_detail_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
                @endif
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
@include('surat_jalan.detail.modal.create')
@include('surat_jalan.detail.modal.edit')
@endpush

@push('js')
@include('surat_jalan.detail._script')
@endpush