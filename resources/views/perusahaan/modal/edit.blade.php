<!-- Modal -->
<div class="modal fade" id="perusahaan_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="perusahaan_edit" enctype="multipart/form">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id_edit">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Nama perusahaan" name="nama_perusahaan" id="nama_perusahaan_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="singkatan">Singkatan</label>
                                <input type="text" name="singkatan" id="singkatan_edit" class="form-control" placeholder="Singkatan">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" name="no_telp" id="no_telp_edit" class="form-control" placeholder="No Telp">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_fax">Fax</label>
                                <input type="text" name="no_fax" id="no_fax_edit" class="form-control" placeholder="Fax">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea name="alamat_perusahaan" id="alamat_perusahaan_edit" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Provinsi">Provinsi</label>
                                <select name="" id="provinsi_edit" class="form-control"></select>
                                <input type="hidden" name="provinsi" id="provinsi_nama_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Kota">Kota</label>
                                <select name="" id="kota_edit" class="form-control"></select>
                                <input type="hidden" name="kota" id="kota_nama_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Kecamatan">Kecamatan</label>
                                <select name="" id="kecamatan_edit" class="form-control"></select>
                                <input type="hidden" name="kecamatan" id='kecamatan_nama_edit'>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="user">User</label>
                                <select name="user" id="user_id_edit" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}} | {{$user->role->nama_role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="aninvoice">A.n Invoice</label>
                                <input type="text" name="aninvoice" id="aninvoice_edit" class="form-control" placeholder="Atas Nama Invoice">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bank">Bank</label>
                                <input type="text" name="bank" id="bank_edit" class="form-control" placeholder="Bank">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id='logo_edit' class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="stempel">Stempel</label>
                                <input type="file" name="stempel" id='stempel_edit' class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kop_surat">Kop Surat</label>
                                <input type="file" name="kop_surat" id='kop_surat_edit' class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="swal-update-button">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>