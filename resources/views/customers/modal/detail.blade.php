<!-- Modal -->
<div class="modal fade" id="detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
      <div class="table-responsive">
        
        <input type="hidden" id="id_detail_customer">
        <br>
        <br>
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">Alamat Lengkap</th>
              <th scope="col">Alamat Daerah</th>
              <th scope="col">Provinsi</th>
              <th scope="col">Kota</th>
              <th scope="col">Kecamatan</th>
            </tr>
          </thead>
          <tbody id="detail_table">
          </tbody>
        </table>
      </div>
    </div>
        </div>

      </div>
      <div class="modal-footer">
        <button id="customer_all" class="btn btn-primary float-left text-white">Edit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>