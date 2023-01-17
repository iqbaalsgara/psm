<script>
    $(document).ready(function() {

        // AutoComplete Nama Barang Tambah
        $("#nama_barang1").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "/surat_jalan/autocomplete",
                    type: "get",
                    data: {
                        search: request.term,
                    },
                    success: function(data) {
                        response(data);                },
                    });
            },
        });

        // AutoComplete Nama Barang Tambah
        $("#nama_barang_edit").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "/surat_jalan/autocomplete",
                    type: "get",
                    data: {
                        search: request.term,
                    },
                    success: function(data) {
                        response(data);                },
                    });
            },
        });

        const d = new Date();

        function bulan(bulan) {
            var data = ['I',"II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];

            var romawi = data[bulan];
            return romawi; 
        }

        $(".swal-edit-button").click(function() {
            let token = $("input[name=_token]").val();
            let id2 = $(this).data("id");
            let id = $("#id_surat_jalan").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "/surat_jalan/"+id+"/detail/"+id2,
                type: "GET",
                data: {
                    id: id,
                    id2:id2,
                    _token: token
                },
                success: function(data) {
                    $('#nama_barang_edit').val(data.data.nama_barang);
                    $('#harga_po_edit').val(data.data.harga_po);
                    $('#unit_edit').val(data.data.unit);
                    $('#qty_edit').val(data.data.qty);
                    $('#id_edit').val(id2);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info Detail Surat Jalan Detail.", "warning");
                }
            });
        });


        $("form[name='surat_jalan_detail_edit']").submit(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let token = $("input[name=_token]").val();
            let id2  = $('#swal-update-button').data("id");
            let id = $("#id_perusahaan").val();
            var formData = new FormData(this);

            $.ajax({
                url: "/surat_jalan/"+id+"/detail/update",
                type: "post",
                data:formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil diubah.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                },
                error: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: "Gagal",
                        text: data.responseJSON.error,
                        icon: "error",
                        showConfirmButton: true
                    });
                }
            });
        });

        $("form[name='surat_jalan_detail_create']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id_surat_jalan = $("#id_surat_jalan").val();
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "/surat_jalan/"+id_surat_jalan+"/detail/create",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                },
                error: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: "Gagal",
                        text: data.responseJSON.error,
                        icon: "error",
                        showConfirmButton: true
                    });
                }
            })
        })

        $(".swal-delete-button").click(function() {
            Swal.fire({
                title: "Hapus?",
                text: "Data tidak akan bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    let id = $(this).data("id");
                    let id_surat_jalan = $('#id_surat_jalan').val();
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "/surat_jalan/"+id_surat_jalan+"/detail/"+id+"/delete",
                        type: "POST",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent();
                                        if (content) {
                                            const b = content.querySelector("b");
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft();
                                            }
                                        }
                                    }, 100);
                                },
                                showConfirmButton: false
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });

        $('.tambah_barang').click(function() {
            var number = parseInt($('#hidden_number').val()) + 1;
            $('#hidden_number').val(number)
        // $('#hidden_number').val(number);
        $('#barang_col').append(`
            <div id="form-barang-${number}"  class="row">
            <div class="col-lg-4">
            <div class="form-group">
            <input type="hidden" id="hidden_number" value="${number}">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control nabar" onkeyup="this.value = this.value.toUpperCase();" name="nama_barang[]" id="nama_barang${number}" autocomplete="off">
            </div>
            </div>
            <div class="col-lg-1">
            <div class="form-group">
            <label for="">Unit</label>
            <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" name="unit[]" id="unit${number}" autocomplete="off">
            </div>
            </div>
            <div class="col-lg-2">
            <div class="form-group">
            <label for="">QTY</label>
            <input type="number" class="form-control" name="qty[]" id="qty${number}" autocomplete="off">
            </div>
            </div>
            <div class="col-lg-3">
            <div class="form-group">
            <label for="">Harga PO</label>
            <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" class="form-control numbering" name="harga_po[]"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_po${number}" autocomplete="off">
            </div>
            </div>
            </div>
            <div class="col-lg-2">
            <div class="form-group">
            <label for="">Aksi</label>
            <button class="btn btn-danger form-control" data-id="${number}" type="button" id="button_hapus">
            <span class="fas fa-trash"></span>
            </button>
            </div>
            </div>
            </div>
            `)
        $('#barang_col').find('#nama_barang'+number).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "/surat_jalan/autocomplete",
                    type: "get",
                    data: {
                        search: request.term,
                    },
                    success: function(data) {
                        response(data);                },
                    });
            },
        })
    });

        $("#barang_col").on('click','#button_hapus',function () {
            console.log('aaa')
            var number = $(this).data("id");
            $("#form-barang-"+number).remove()
        });
    });

function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)){
            c = b.substr(i-1,1) + "." + c;
        } else {
            c = b.substr(i-1,1) + c;
        }
    }
    if (_minus) c = "-" + c ;
    return c;
}

function numbersonly(ini, e){
    if (e.keyCode>=49){
        if(e.keyCode<=57){
            a = ini.value.toString().replace(".","");
            b = a.replace(/[^\d]/g,"");
            b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
            ini.value = tandaPemisahTitik(b);
            return false;
        }
        else if(e.keyCode<=105){
            if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
    return false; }
}else if (e.keyCode==48){
    a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
    b = a.replace(/[^\d]/g,"");
    if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
    } else {
        return false;
    }
}else if (e.keyCode==95){
    a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
    b = a.replace(/[^\d]/g,"");
    if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
    } else {
        return false;
    }
}else if (e.keyCode==8 || e.keycode==46){
    a = ini.value.replace(".","");
    b = a.replace(/[^\d]/g,"");
    b = b.substr(0,b.length -1);
    if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
    } else {
        ini.value = "";
    }

    return false;
} else if (e.keyCode==9){
    return true;
} else if (e.keyCode==17){
    return true;
} else {
//alert (e.keyCode);
return false;
}

}
</script>