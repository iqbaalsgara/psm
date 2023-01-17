<!-- Modal -->
<div class="modal fade" id="surat_jalan_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="surat_jalan_create" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Perusahaan">Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Nama perusahaan" name="perusahaan" value="{{$perusahaan->nama_perusahaan}}" readonly>
                                <input type="hidden" id="perusahaan_id" name="perusahaan_id" value="{{$perusahaan->id}}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Customer</label>                                
                                <select name="customer_id" id="customer_id" class="form-control">
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
                                <select name="detail_customer_id" id="detail_customer_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_sj">No Surat Jalan</label>
                                <input type="text" class="form-control" placeholder="No surat jalan" name="no_sj" id="no_sj">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="po">PO</label>
                                <input type="text" name="po" id="po" class="form-control" placeholder="PO" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                <div id="po_text">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="pr">PR</label>
                                <input type="text" name="pr" id="pr" class="form-control" placeholder="PR" autocomplete="off" onkeyup="this.value = this.value.toUpperCase();">
                                <div id="pr_text">

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="">Partial</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="partial" id="partial" value="yes">
                                <label for="partial" class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="partial" id="partial" value="no" checked>
                                <label for="partial" class="form-check-label">No</label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Note">Note</label>
                                <textarea name="note" id="note" class="form-control" cols="30" rows="10">-</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12" id="barang_col">
                            <div id="form-barang-1"  class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="hidden" id="hidden_number" value="1">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control nabar" onkeyup=" var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" name="nama_barang[]" id="nama_barang1" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Qty</label>
                                        <input type="number" class="form-control" name="qty[]" id="qty1" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Unit</label>
                                        <input type="text" class="form-control" onkeyup=" var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" name="unit[]" id="unit1" autocomplete="off">
                                    </div>
                                </div>
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Harga PO</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" class="form-control numbering" name="harga_po[]" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_po1" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label for="">Aksi</label>
                                        <button class="btn btn-danger form-control" type="button" id="button_reset">
                                            <span class="fas fa-trash"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success flaot-left tambah_barang">Add</button>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>