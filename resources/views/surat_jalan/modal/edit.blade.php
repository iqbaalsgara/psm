<!-- Modal -->
<div class="modal fade" id="surat_jalan_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="surat_jalan_edit">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="col-lg-6">
                        <input type="hidden" name="id" id="id_edit">
                            <div class="form-group">
                                <label for="Perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Nama perusahaan" name="perusahaan_edit" value="{{$perusahaan->nama_perusahaan}}" readonly>
                                <input type="hidden" id="perusahaan_id_edit" name="perusahaan_id" value="{{$perusahaan->id}}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Customer</label>                                
                                <select name="customer_id" id="customer_id_edit" class="form-control">
                                    <option value="">Pilih Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->nama_customer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="detail_customer">Alamat Customer</label>                                
                                <select name="detail_customer_id" id="detail_customer_id_edit" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_sj">No Surat Jalan</label>
                                <input type="text" class="form-control" placeholder="No surat jalan" name="no_sj" id="no_sj_edit">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="po">PO</label>
                                <input type="text" name="po" id="po_edit" class="form-control" placeholder="PO">
                                <div id="po_edit_text">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pr">PR</label>
                                <input type="text" name="pr" id="pr_edit" class="form-control" placeholder="pr">
                                <div id="pr_edit_text">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="">Partial</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="partial" id="partial_edit" value="yes">
                                <label for="partial" class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="partial" id="partial_edit" value="no" checked>
                                <label for="partial" class="form-check-label">No</label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Note">Note</label>
                                <textarea name="note" id="note_edit" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Note">Tgl Invoice</label>
                                <input type="datetime-local" value="2021-11-25 10:15:00"name="tgl_invoice" step="1" id="tgl_invoice_edit" class="form-control">
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