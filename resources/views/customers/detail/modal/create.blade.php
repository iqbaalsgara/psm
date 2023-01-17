<!-- Modal -->
<div class="modal fade" id="customer_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="detail_customer_create">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" rows="10" cols="40" id="alamat_lengkap" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="alamat_daerah">Daerah</label>
                                <input type="text" name="alamat_daerah" id="alamat_daerah" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Provinsi">Provinsi</label>
                                <select name="" id="provinsi" class="form-control"></select>
                                <input type="hidden" name="" id="provinsi_nama">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Kota">Kota</label>
                                <select name="" id="kota" class="form-control"></select>
                                <input type="hidden" name="" id="kota_nama">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="Kecamatan">Kecamatan</label>
                                <select name="" id="kecamatan" class="form-control"></select>
                                <input type="hidden" name="" id='kecamatan_nama'>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>