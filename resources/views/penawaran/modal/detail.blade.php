<!-- Modal -->
<div class="modal fade" id="penawaran_detail_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Detail Penawaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
      <div class="table-responsive">
        <input type="hidden" id="id_penawaran">
        <br>
        <br>
        <table class="table table-bordered table-hover" id="datatable">

          <thead>
            <tr align="center">
              <th scope="col">Name And Specification</th>
              <th scope="col">Qty</th>
              <th scope="col">Unit</th>
              <th scope="col">Unit Price<br>Currency IDR</th>
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
        <!--
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      -->
        <a id="detail_all_button" class="btn btn-primary float-left text-white">Edit</a>
      </div>
    </div>
  </div>
</div>