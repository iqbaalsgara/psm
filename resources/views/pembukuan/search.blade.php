@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => 'Pembukuan'])

@section('content')


    <div class="row">
    <div class="col-lg-6"></div>
      <div class="col-lg-6">
        <div class="float-right">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari No SJ" id="cari_sj">
              <div class="input-group-append">
                  <button class="btn btn-secondary" id="button_cari">
                    <i class="fa fa-search"></i>
                  </button>
              </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
      <div class="card bg-light">
        <div class="row px-3 py-3">
          <div class="col-lg-12">
          <div class="card-body">
          <div class="row bg-white rounded">
              <div class="col">
                <h3><b>{{$surat_jalan->no_sj}}</b></h3>
                <p class="card-text"> 
                  Customer : {{$surat_jalan->customer->nama_customer}} <br>
                  PO : {{$surat_jalan->po}} <br>
                  PR : {{$surat_jalan->pr}}
                </p>
              </div>
              <div class="col text-right">
                <br>
              </div>
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
                    <?php $total = 0; ?>
                    @foreach ($surat_jalan->detail_surat_jalan as $data)
                    <div class="row bg-white rounded">
                    <div class="col">
                        <b>{{$data->nama_barang}}</b>
                        <p class="card-text"> {{$data->qty}} {{$data->unit}}</p>
                        <input type="hidden" name="id[]" value="{{$data->id}}">
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control numbering" name="harga_asli[]" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_asli" value="{{substr($data->harga_asli,0, strlen($data->harga_asli) -3)}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <input type="text" id="deskripsi{{$data->id}}" class="form-control" value="{{$data->deskripsi}}" placeholder="Deskripsi" name="deskripsi[]">
                        </div>
                    </div>
                    </div>
                    <br>
                    <?php
                    $total += substr($data->harga_asli,0, strlen($data->harga_asli) -3)
                    ?>
                    @endforeach
                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" class="form-control" id="total" value="{{$total}}" readonly>
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
            <br>
            <!-- <center>
                <button class="btn btn-lg btn-outline-success" id="button-tampilkan">Tampilkan Lebih</button>
            </center> -->
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>

@endsection

@push('js')
@include('pembukuan._script2')
@endpush
