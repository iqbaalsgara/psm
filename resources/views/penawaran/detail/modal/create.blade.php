<!-- Modal -->
<div class="modal fade" id="penawaran_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="penawaran_detail_create" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <div class="col-lg-12" id="barang_col">
                            <div id="form-barang-1"  class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                        <input type="hidden" id="hidden_number" value="1">
                                        <label for="">Name And Specification</label>
                                        <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="nama_barang[]" id="nama_barang1">
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
                                        <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="unit[]" id="unit1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Unit Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control numbering" name="harga[]" id="harga1" autocomplete="off">
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
                        <button type="button" id="" class="btn btn-success flaot-left tambah_barang">Add</button>
                        <!--
                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Tutup</button>
                        -->
                        <button type="submit" class="btn btn-primary float-right">Tambah Data</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>