
<!-- Modal -->
<div class="modal fade" id="surat_jalan_detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Detail Surat Jalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              <input type="hidden" id="id_surat_jalan">
              <table class="table table-bordered table-hover" id="datatable">
                <thead>
                  <tr align="center">
                    <th scope="col">Name And Specification</th>
                    <th scope="col">Unit Price<br>Currency IDR</th>
                    <!--<th scope="col">Harga Beli</th>-->
                    <th scope="col">Unit</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Status Item</th>
                    <th scope="col">Purchase Date</th>
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
        <button id="detail_all_button" class="btn btn-primary float-left text-white">Edit</button>
        <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>-->
      </div>
    </div>
  </div>
</div>