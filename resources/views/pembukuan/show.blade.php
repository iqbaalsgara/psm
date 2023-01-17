@extends('layouts.stisla.index', ['title' => 'Pembukuan', 'page_heading' => $surat_jalan->no_sj])

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


<div class="row">
  <div class="col-lg-12">
    <div class="card bg-light">
      <div class="row px-3 py-3">
        <div class="col-lg-12">
          <form action="/pembukuan/selesai" method="post">
            {{csrf_field()}}
            <div class="card-body">
              <div class="row bg-white">
                <div class="col">Nama Barang</div>
                <div class="col">Harga Beli</div>
                <div class="col">Deskripsi</div>
                <div class="col-12">
                  <br>
                </div>
              </div>
              @foreach ($surat_jalan_detail as $item)
              <div class="row bg-white rounded">
                <div class="col">
                  <b>{{$item->nama_barang}}</b>
                  <p class="card-text"> {{$item->qty}} {{$item->unit}}</p>
                  <input type="hidden" name="id[]" value="{{$item->id}}">
                </div>
                <div class="col">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control numbering" name="harga_asli[]" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_asli" value="{{substr($item->harga_asli,0, strlen($item->harga_asli) -3)}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <input type="text" id="deskripsi{{$item->id}}" class="form-control" value="{{$item->deskripsi}}" placeholder="Deskripsi" name="deskripsi[]">
                  </div>
                </div>
              </div>
              <br>
              @endforeach
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Total</label>
                    <input type="text" class="form-control" id="total" readonly>
                    <div id="terbilang" class="">

                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group float-right">
                    <button class="btn btn-lg btn-success" type="submit">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
@include('pembukuan._script')
@endpush
