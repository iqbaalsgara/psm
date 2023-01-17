<!-- Modal -->
<div class="modal fade" id="penawaran_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="penawaran_edit">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="id" id="id_edit">
                            <div class="form-group">
                                <label for="Perusahaan">Perusahaan</label>
                                <select name="perusahaan_id" id="perusahaan_id_edit" class="form-control">
                                    <option value="null">-- Pilih --</option>
                                    @foreach ($perusahaans as $perusahaan)
                                        <option value="{{$perusahaan->id}}">{{$perusahaan->nama_perusahaan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Alamat Customer</label>                                
                                <select name="customer_id" id="customer_id_edit" class="form-control">
                                <option value="">--pilih--</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Customer</label>                                
                                <select name="detail_customer_id" id="detail_customer_id_edit" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="attn">Attn</label>
                                <input type="text" class="form-control" placeholder="Attn" name="attn" id="attn_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_penawaran">No Penawaran</label>
                                <input type="text" class="form-control" placeholder="No Penawaran Harga" name="no_penawaran_harga" id="no_penawaran_harga_edit">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan_edit" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="delivery">Delivery</label>
                                <textarea name="delivery" id="delivery_edit" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="delivery">Tanggal</label>
                                <input type="datetime-local" value="2021-11-25 10:15:00"name="tgl" step="1" id="tgl_edit" class="form-control">
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