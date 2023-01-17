<!-- Modal -->
<div class="modal fade" id="arsip_detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr>
              <th scope="col">Nama Barang</th>
              <th scope="col">Harga PO</th>
              <th scope="col">Harga Beli</th>
              <th scope="col">Unit</th>
              <th scope="col">QTY</th>
              <th scope="col">Tgl Beli</th>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>