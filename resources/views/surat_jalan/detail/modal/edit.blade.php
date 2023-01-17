<!-- Modal -->
<div class="modal fade" id="surat_jalan_detail_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="surat_jalan_detail_edit">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id_edit">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" onkeyup="this.value = this.value.toUpperCase();" id="nama_barang_edit">
                            </div>
                        </div>

                        <div class="col-lg-1">
                            <div class="form-group">
                                <label for="">Unit</label>
                                <input type="text" class="form-control" name="unit" onkeyup="this.value = this.value.toUpperCase();" id="unit_edit">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">QTY</label>
                                <input type="number" class="form-control" name="qty" id="qty_edit">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Harga PO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="number" class="form-control numbering" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="harga_po" id="harga_po_edit">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="swal-update-button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>