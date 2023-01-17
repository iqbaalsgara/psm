@extends('layouts.stisla.index', ['title' =>'Perusahaan', 'page_heading' => 'Arsip '.$year.'-'.$month])

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
              <th scope="col">Partial</th>
              <th scope="col">Note</th>
              <th scope="col">Aksi</th>
              <th scope="col">Print</th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($surat_jalan as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><a href="/surat_jalan/{{$item->id}}/detailAll">{{ $item->no_sj }}</a></td>
              <td>{{ $item->customer->nama_customer }}</td>
              <td>{{ $item->detail_customer->alamat_lengkap }}</td>
              <td>{{ $item->po }}</td>
              <td>{{ $item->pr}}</td>
              <td>{{ $item->status}}</td>
              <td>{{ $item->partial}}</td>
              <td>{{ $item->note }}</td>
              <td>
              <a data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white detail-button" data-toggle="modal" data-placement="top" title="Detail" data-target="#arsip_detail_modal">
                  <i class="fas fa-fw fa-info"></i>
                </a>
              <a data-id="{{ $item->id }}" class="btn btn-sm btn-danger swal-arsip-back-button text-white" data-toggle="tooltip" data-placement="bottom" title="Kembalikan ke surat jalan">
                  <i class="fas fa-fw fa-times"></i>
                </a>
              </td>
              <td>
                <a href="/surat_jalan/{{ $item->perusahaan_id }}/perusahaan/{{ $item->id}}/print" data-id="{{ $item->id }}" class="btn btn-sm btn-info text-white" data-toggle="tooltip" data-placement="bottom" title="Print Surat Jalan">
                  <i class="fas fa-fw fa-print"></i>
                </a>
                <a href="/surat_jalan/{{ $item->perusahaan_id }}/perusahaan/{{ $item->id}}/printInvoice" data-id="{{ $item->id }}" class="btn btn-sm btn-secondary text-white" data-toggle="tooltip" data-placement="bottom" title="Print Inv">
                  <i class="fas fa-fw fa-file"></i>
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
@include('arsip.modal.detail')
@endpush

@push('js')
@include('arsip._script')
@endpush