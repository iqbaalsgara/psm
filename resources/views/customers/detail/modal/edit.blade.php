<!-- Modal -->
<div class="modal fade" id="detail_customer_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="detail_customer_edit">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" name="" id="id_edit">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" rows="10" cols="40" id="alamat_lengkap_edit" class="form-control" onkeyup="this.value = this.value.toUpperCase();"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="hidden" name="" id="id_edit">
                                <label for="alamat_daerah">Daerah</label>
                                <input name="alamat_daerah" rows="10" cols="40" id="alamat_daerah_edit" class="form-control"></input>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Provinsi">Provinsi</label>
                                <input type="hidden" name="" id="id_edit">
                                <select name="" id="provinsi_edit" class="form-control"></select>
                                <input type="hidden" name="" id="provinsi_nama_edit">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Kota">Kota</label>
                                <input type="hidden" name="" id="id_edit">
                                <select name="" id="kota_edit" class="form-control"></select>
                                <input type="hidden" name="" id="kota_nama_edit">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Kecamatan">Kecamatan</label>
                                <input type="hidden" name="" id="id_edit">
                                <select name="" id="kecamatan_edit" class="form-control"></select>
                                <input type="hidden" name="" id='kecamatan_nama_edit'>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="swal-update-button">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>