@extends('layouts.stisla.index', ['title' => 'Report', 'page_heading' => 'Report'])

@section('content')

@if ($message = Session::get('message'))
          <div class="alert alert-{{Session::get('alert')}} alert-dismissible show fade">
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
          <div class="card-body">
            <h5 class="card-title">Report</h5>
            <form action="/report/tarik_data" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select name="type" id="" class="form-control">
                                    <option value="surat_jalan">Surat Jalan</option>
                                    <option value="penawaran">Penawaran</option>
                                    <option value="pajak">Pajak</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal awal</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
          </div>
          </div>
        </div>
      </div>

@endsection
