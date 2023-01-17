<!-- Modal -->
<div class="modal fade" id="customer_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form name="customer_edit">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="customer_name">Nama Customer</label>
                                <input type="hidden" name="" id="id_edit">
                                <input type="text" class="form-control" placeholder="Nama Customer" name="nama_customer" id="nama_customer_edit" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="hidden" name="" id="id_edit">
                                <input type="text" class="form-control" placeholder="No Telp" name="no_telp" id="no_telp_edit">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="hidden" name="" id="id_edit">
                                <input type="text" class="form-control" placeholder="Fax" name="no_fax" id="no_fax_edit">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary float-left text-white" id="swal-update-button">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>