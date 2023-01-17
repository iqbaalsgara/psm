@extends('layouts.stisla.index', ['title' => 'Pembelian', 'page_heading' => 'Pembukuan '])

@section('content')
<a href="{{ route('exportpembukuan') }}" class="btn btn-success">Export</a>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Import</a>
@foreach ($surat_jalan as $item)
<table class="table table-bordered" id="datatable">
  <form action="/pembukuan/selesai" method="post">
    <tbody>
      <tr class="accordion" id="accordionExample">
        <td>{{$item->no_sj}} </td>
        <td>{{$item->customer->nama_customer}} </td>
        <td>{{$item->po}}</td>
        <td>{{$item->pr}}</td>
        <td>{{ $item->status}}</td>
      <!--
      <td>
        <div class="form-group float-right">
        <button class="btn btn-lg btn-success" type="submit">Save</button>
        </div> 
      </td>
    -->
  </tr>
  <tr class="panel">
    <td colspan="7">
      <div class="fold-content">
        <h4>Detail Item</h4>
        <table width="100%">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Name And Specification</th>
              <th>Qty</th>
              <th>Unit</th>
              <th>Unit Price<br>Currency IDR</th>
              <th>Buy Price</th>
            </tr>
          </thead>
          @foreach ($item->detail_surat_jalan as $data)
          {{csrf_field()}}
          <tbody>
            <tr>
              <input type="hidden" name="id[]" value="{{$data->id}}">
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{$data->nama_barang}}</td>
              <td>{{$data->qty}}</td>
              <td>{{$data->unit}}</td>
              <td>
                <input type="text" readonly="disable" class="form-control numbering" 
                value="{{ number_format(substr($data->harga_po,0, strlen($data->harga_po)),0,",",".")}}">
              </td>
              <td align="right">
                <input type="text"  name="harga_asli[]" class="form-control numbering" 
                onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_asli" 
                value="{{ number_format(substr($data->harga_asli,0, strlen($data->harga_asli)),0,",",".")}}">
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <div class="form-group float-right">
          <button class="btn btn-lg btn-success" type="submit">Save</button>
        </div>          
      </div>
    </td>
  </tr>
</tbody>
</table>
</form>

@endforeach

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  }
</script>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('importpembukuan') }}" method="post" enctype="multipart/form-data">

      <div class="modal-body">

          {{ csrf_field() }}
          <div class="form-group">
            <input type="file" name="file" />
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
        <button type="submit" class="btn btn-primary" value="import">Import</button>
      </div>
    </div>

    </form>

  </div>
</div>

@endsection



@push('js')
@include('pembukuan._script2')
@endpush


