<!-- Modal -->
<div class="modal fade" id="format_nomor_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                    Format Nomor <br>
                    <b>SING:</b> Singkatan <br>
                    <b>NOM:</b> Nomor <br>
                    <b>BUL:</b> Bulan <br>
                    <b>TAH:</b> Tahun <br>
                    *selain itu bukan format nomor
                    <br>
                    Contoh untuk <i>01/DN/PSM/XI/2021</i> : NOM/DN/SING/BUL/TAH
                    </div>
                </div>
            <form name="format_nomor_edit">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama_format">Nama Format</label>
                                <input type="text" class="form-control" placeholder="Nama Format" name="nama_format" id="nama_format_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="surat_jalan">Surat Jalan</label>
                                <input type="hidden" id="id_edit" name="id">
                                <input type="text" class="form-control" placeholder="Surat Jalan" name="surat_jalan" id="surat_jalan_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="invoice">Invoice</label>
                                <input type="text" class="form-control" placeholder="Invoice" name="invoice" id="invoice_edit">
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="penawaran">Penawaran</label>
                                <input type="text" class="form-control" placeholder="Penawaran" name="penawaran" id="penawaran_edit">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="swal-update-button">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>