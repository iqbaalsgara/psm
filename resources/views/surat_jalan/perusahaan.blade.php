@extends('layouts.stisla.index', ['title' =>'Perusahaan', 'page_heading' => $perusahaan->nama_perusahaan])

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
      <!--
      <button type="button" class="btn btn-info float-right mt-3 mx-3" data-toggle="modal" data-target="#surat_jalan_jadwal_modal">
        <i class="fas fa-fw fa-truck"></i>
        Buat Jadwal Pengiriman
      </button>
    -->
    <button type="button" class="btn btn-info float-right mt-3 mx-3" data-toggle="modal" data-target="">
        <i class="fas fa-fw fa-file-pdf"></i>
        Tanda Terima PDF
      </button>
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" data-toggle="modal" data-target="#surat_jalan_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Surat Jalan
      </button>
      <input type="hidden" name="" id="id_perusahaan" value="{{$perusahaan->id}}">
    </div>
  </div>
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">No SJ</th>
              <th scope="col">Customer</th>
              <th scope="col">Alamat</th>
              <th scope="col">PO</th>
              <th scope="col">PR</th>
              <th scope="col">Status</th>
              <!--<th scope="col">Partial</th>-->
              <th scope="col">Note</th>
              <th scope="col">Aksi</th>
              <th scope="col">Print</th>
            </tr>
          </thead>
          <tbody>

            @foreach($surat_jalan as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <!--<td><a href="/surat_jalan/{{$item->id}}/detailAll">{{ $item->no_sj }}</a></td>-->
              <td align="left"><b>{{ $item->no_sj }}</b></td>
              <td>{{ $item->customer->nama_customer }}</td>
              <!-- <td>{{ $item->detail_customer->alamat_lengkap }}</td> -->
              <td>{{ $item->detail_customer->alamat_daerah }}</td>
              <td><b>{{ $item->po }}</b></td>
              <td>{{ $item->pr}}</td>
              <td>{{ $item->status}}</td>
              <!--<td>{{ $item->partial}}</td>-->
              <td>{{ $item->note }}</td>
              
              <td class="text-left">
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white detail-button" data-toggle="modal" data-placement="top" title="Detail" data-target="#surat_jalan_detail_modal">
                  <i class="fas fa-fw fa-info"></i>
                </a>
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-warning text-white swal-edit-button" data-toggle="modal" data-target="#surat_jalan_edit_modal" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>
                @if ($item->status != 'Batal')
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>
                @endif
                @if ($item->tgl_pembelian!= null)
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-success text-white swal-check-button" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi pengiriman">
                  <i class="fas fa-fw fa-check"></i>
                </a>
                @endif
                <!--
                @if ($item->tgl_invoice != null)
                <a data-id="{{ $item->id }}" class="btn btn-sm btn-secondary text-white swal-arsip-button" data-toggle="tooltip" data-placement="bottom" title="Arsip Surat Jalan">
                  <i class="fas fa-fw fa-archive"></i>
                </a>
                @endif
              -->
            </td>
            <td>
              <a href="/surat_jalan/{{ $item->perusahaan_id }}/perusahaan/{{ $item->id}}/print" data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white" data-toggle="tooltip" data-placement="bottom" title="Print Surat Jalan">
                <i class="fas fa-fw fa-print"></i>
              </a>
              @if ($item->tgl_input != null)
              <a href="/surat_jalan/{{ $item->perusahaan_id }}/perusahaan/{{ $item->id}}/printInvoice" data-id="{{ $item->id }}" class="btn btn-sm btn-secondary text-white" data-toggle="tooltip" data-placement="bottom" title="Print Inv">
                <i class="fas fa-fw fa-file"></i>
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
@include('surat_jalan.modal.create')
@include('surat_jalan.modal.edit')
@include('surat_jalan.modal.detail')
@include('surat_jalan.modal.jadwal')
@endpush

@push('js')
@include('surat_jalan._script')
@endpush