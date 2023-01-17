@extends('layouts.stisla.index', ['title' => 'Halaman Data Barang', 'page_heading' => 'Surat Jalan'])

@section('content')
<div class="card">

  @if (session()->has('sukses'))
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>×</span>
        </button>
        {{session()->get('sukses')}}
      </div>
    </div>
  @endif



  <div class="row">
    <div class="col-lg-12">
      <a href="{{ route('barang.print') }}" class="btn btn-success float-right mt-3 mx-3" 
         data-toggle="tooltip" title="Print">
        <i class="fas fa-fw fa-print"></i>
      </a>

      <button type="button" class="btn btn-primary float-right mt-3 mx-3" 
              data-toggle="modal" data-target="#commodity_create_modal">
        <i class="fas fa-fw fa-plus"></i>
        Tambah Data
      </button>

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary float-right mt-3 mx-3" 
              data-toggle="modal" data-target="#excel_menu">
        Import
      </button>

      <a href="{{ route('excel.barang.export') }}" class="btn btn-success float-right mt-3 mx-3" data-toggle="tooltip" title="Export Excel">
        <i class="fas fa-fw fa-file-excel"></i>
      </a>

    </div>
  </div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item"><a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">Indocement</a></li>
  <li class="nav-item"><a class="nav-link" href="#tab2" role="tab" data-toggle="tab">Palyja</a></li>
  <li class="nav-item"><a class="nav-link" href="#tab3" role="tab" data-toggle="tab">TCK</a></li>
  <li class="nav-item"><a class="nav-link" href="#tab4" role="tab" data-toggle="tab">Tasblock</a></li>
  <li class="nav-item"><a class="nav-link" href="#tab5" role="tab" data-toggle="tab">Samsung</a></li>
  <li class="nav-item"><a class="nav-link" href="#tab5" role="tab" data-toggle="tab">Rhythm</a></li>
</ul>
<!--Data Barang-->
<!------------------------------------------------------------------------------------------------------->  
  <div class="row px-3 py-3">
    <div class="col-lg-12">
      <div class="table-responsive">

        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <!--<th scope="col">#</th>
              <th scope="col">Kode Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Tahun Pembelian</th>
              <th scope="col">Kondisi</th>
              <th scope="col">Aksi</th>-->

              <th scope="col">No</th>
              <th scope="col">Surat Jalan</th>
              <th scope="col">PO</th>
              <th scope="col">PR</th>
              <th scope="col">Kondisi</th>
              <th scope="col">Aksi</th>

            </tr>
          </thead>

          <tbody>
            @foreach($commodities as $commodity)
            <tr>
              <th scope="row">  {{ $loop->iteration }}                        </th>
              <td>              {{ $commodity->item_code }}                   </td>
              <td>              {{ Str::limit($commodity->name, 55, '...') }} </td>
              <td>              {{ $commodity->date_of_purchase }}            </td>
              @if($commodity->condition === 1)
              <td>
                <span class="badge badge-pill badge-success" 
                      data-toggle="tooltip" data-placement="top" title="Baik">        Success</span>
              </td>
              @elseif($commodity->condition === 2)
              <td>
                <span class="badge badge-pill badge-warning" 
                      data-toggle="tooltip" data-placement="top" title="Kurang Baik"> Process</span>
              </td>
              @else
              <td>
                <span class="badge badge-pill badge-danger" 
                      data-toggle="tooltip" data-placement="top" title="Rusak Berat"> Cancel</span>
              </td>
              @endif

              <td class="text-center">
                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-info text-white show_modal" 
                   data-toggle="modal" data-target="#show_commodity" title="Lihat Detail">
                  <i class="fas fa-fw fa-info"></i>
                </a>

                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-success text-white swal-edit-button" 
                   data-toggle="modal" data-target="#edit_commodity" data-placement="top" title="Ubah data">
                  <i class="fas fa-fw fa-edit"></i>
                </a>

                <a href="{{ route('barang.print.one', $commodity->id) }}" class="btn btn-sm text-white btn-primary" 
                   data-toggle="tooltip" title="Print">
                  <i class="fas fa-fw fa-print"></i>
                </a>

                <a data-id="{{ $commodity->id }}" class="btn btn-sm btn-danger text-white swal-delete-button" 
                   data-toggle="tooltip" data-placement="top" title="Hapus data">
                  <i class="fas fa-fw fa-trash-alt"></i>
                </a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
<!-------------------------------------------------------------------------------------------------------> 
      </div>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('commodities.modal.show')
@include('commodities.modal.create')
@include('commodities.modal.edit')
@include('commodities.modal.import')
@endpush

@push('js')
@include('commodities._script')
@endpush