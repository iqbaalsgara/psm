<!-- Modal -->
<div class="modal fade" id="surat_jalan_jadwal_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Buat pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_jadwal" action="/surat_jalan/{{$perusahaan->id}}/buat_jadwal" method="post">
          <div class="row">
            {{csrf_field()}}
            <div class="col-lg-12">
              <label for="">Nama Pengiriman</label>
              <input type="date" class="form-control"  name="nama_pengiriman" id="nama_pengiriman">
            </div>
            <div class="col-lg-12">
              <label for="">Customer</label>
              <select id="customer_jadwal" class="form-control">
                <option value="null">Pilih Customer </option>
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-12">
              <label for="">Surat Jalan</label>
              <select name="surat_jalan[]" id="surat_jalan_jadwal" class="form-control" multiple="multiple">

              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form_jadwal" class="btn btn-success" id="save_jadwal_button">Save</button>
      </div>
    </div>
  </div>
</div>