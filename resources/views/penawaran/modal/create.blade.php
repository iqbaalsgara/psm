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
                <form name="penawaran_create" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <input type='hidden' name='nambutpenawaran' id="nambutpenawaran" value='{{ auth()->user()->name }}' />

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Perusahaan">Perusahaan</label>
                                <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                                    <option value="null">Pilih Perusahaan</option>
                                    @foreach ($perusahaans as $perusahaan)
                                        <option value="{{$perusahaan->id}}">{{$perusahaan->nama_perusahaan}}</option>
                                    @endforeach
                                </select>
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

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="customer">Customer</label>                                
                                <select name="detail_customer_id" id="detail_customer_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="attn">Attn</label>
                                <input type="text" class="form-control" placeholder="Attn" name="attn" id="attn">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="no_penawaran">No Penawaran</label>
                                <input type="text" class="form-control" placeholder="No Penawaran Harga" name="no_penawaran_harga" id="no_penawaran_harga">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10">-</textarea>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="delivery">Delivery</label>
                                <textarea name="delivery" id="delivery" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tgl">Tanggal</label>
                                <input type="datetime-local" step="1" value="<?php echo date('Y-m-d\TH:i'); ?>" name="tgl" id="tgl" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12" id="barang_col">
                            <div id="form-barang-1"  class="row">
                                <div class="col-lg-3">
                                        <div class="form-group">
                                        <input type="hidden" id="hidden_number" value="1">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="nama_barang[]" id="nama_barang1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Unit</label>
                                        <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="unit[]" id="unit1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">QTY</label>
                                        <input type="number" class="form-control" name="qty[]" id="qty1">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control numbering" name="harga[]" id="harga1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
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
                        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary float-right">Tambah Data</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>