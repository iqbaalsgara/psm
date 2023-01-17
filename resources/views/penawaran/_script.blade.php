<script>
    $(document).ready(function() {

        $("#nama_barang1").autocomplete({
            source: function( request, response ) {
            $.ajax({
                url: "/penawaran/search/autocomplete",
                type: "get",
                data: {
                    search: request.term,
                },
                success: function(data) {
                response(data);                },
            });
            },
        });

        $('#barang_button').click(function() {
            var pt = $('#barang_pt').val();
            var barang = $('#barang_cari').val();
            if (barang === "") {
                window.location.href = "/penawaran/cari/"+pt+"/null"
            }
            else {
                window.location.href = "/penawaran/cari/"+pt+"/"+barang
            }
        });

        const d = new Date();

        function bulan(bulan) {
            var data = ['I',"II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];

            var romawi = data[bulan];
            return romawi; 
        }

        $('#detail_all_button').click(function() {
            var id = $('#id_penawaran').val();
            window.location.href = '/penawaran/'+id+'/detailAll';
        })

        //get alamat customer
        $('#customer_id').change(function() {
            let id_customer = $(this).val();
            let id_perusahaan = $('#id_perusahaan').val();
            $('#detail_customer_id').html('');
            $.ajax({
                type: "GET",
                url: "/surat_jalan/"+id_perusahaan+"/customer/"+id_customer,
                success: function(data) {
                    console.log(data);
                    $.each(data.data, function(index, item) {
                        $('#detail_customer_id').append('<option value="'+data.data[index].id+'">'+data.data[index].alamat_lengkap+'</option>')
                    })
                }
            })
        })

        //get alamat customer
        $('#customer_id_edit').change(function() {
            let id_customer = $(this).val();
            let id_perusahaan = $('#id_perusahaan').val();
            $('#detail_customer_id_edit').html('');
            $.ajax({
                type: "GET",
                url: "/surat_jalan/"+id_perusahaan+"/customer/"+id_customer,
                success: function(data) {
                    console.log(data);
                    $.each(data.data, function(index, item) {
                        $('#detail_customer_id_edit').append('<option value="'+data.data[index].id+'">'+data.data[index].alamat_lengkap+'</option>')
                    })
                }
            })
        })

        $('#perusahaan_id').change(function() {
            var id = $(this).val();
            let token = $("input[name=_token]").val();
            $.ajax({
                url: "/penawaran/"+id+"/perusahaan",
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $('#no_penawaran_harga').val('')
                    $('#no_penawaran_harga').val("0"+data.penawaran_count+"/PH/"+data.data.singkatan+"/"+bulan(d.getMonth())+"/"+d.getFullYear())
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info Penawaran.", "warning");
                }
            });
        })

        $(".swal-edit-button").click(function() {
            let token = $("input[name=_token]").val();
            let id = $(this).data("id");

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "/penawaran/"+id,
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $('#perusahaan_id_edit').val(data.data.perusahaan_id);
                    $('#customer_id_edit').val(data.data.customer_id); 
                    $('#attn_edit').val(data.data.attn);
                    $('#detail_customer_id_edit').val(data.data.detail_customer_id);
                    $('#no_penawaran_harga_edit').val(data.data.no_penawaran_harga);
                    $('#alamat_delivery_edit').val(data.data.alamat_delivery);
                    $('#delivery_edit').val(data.data.delivery);
                    $('#keterangan_edit').val(data.data.keterangan);
                    $('#nambutpenawaran_edit').val(data.data.nambutpenawaran);
                    $('#tgl_edit').val(data.tgl);
                    $('#id_edit').val(id);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info Detail Penawaran.", "warning");
                }
            });
        });

        $(".detail-button").click(function() {
            let id = $(this).data("id")

            $.ajax({
                type: "GET",
                url: "/penawaran/" + id + "/detail",
                // data: {
                //     id: id,
                //     _token: token
                // },
                success: function(data) {
                    // $('#id_detail_surat_jalan').val('');
                    // $('#id_detail_surat_jalan').val(id);
                    $('#detail_table').html('');
                    console.log(data);
                   $.each(data.data, function(key, value) {
                       $('#id_penawaran').val('');
                       $('#id_penawaran').val(id)
                       $('#detail_table').append(`
                       <tr>
                        <td>${data.data[key].nama_barang}</td>
                        <td align="center">${data.data[key].qty}</td>
                        <td align="center">${data.data[key].unit}</td>
                        <td align="right">${data.data[key].harga}</td>
                        </tr>
                       `)
                   })
                }
            })
        })

        $("form[name='penawaran_edit']").submit(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let token = $("input[name=_token]").val();
            let id = $('#swal-update-button').data("id");
            var formData = new FormData(this);

            $.ajax({
                url: "/penawaran/"+id+"/update",
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


        $("form[name='penawaran_create']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id_perusahaan = $("#id_perusahaan").val();
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "/penawaran/create",
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
                    let id_perusahaan = $('#id_perusahaan').val();
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "/penawaran/"+id+"/delete",
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
                <div class="col-lg-3">
                        <div class="form-group">
                        <input type="hidden" id="hidden_number" value="${number}">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang[]" onkeyup="this.value = this.value.toUpperCase();" id="nama_barang${number}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">Unit</label>
                        <input type="text" class="form-control" name="unit[]"  onkeyup="this.value = this.value.toUpperCase();" id="unit${number}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">QTY</label>
                        <input type="number" class="form-control" name="qty[]" id="qty${number}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control numbering" name="harga[]" id="harga${number}">
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
        $("#nama_barang"+number).autocomplete({
            source: function( request, response ) {
            $.ajax({
                url: "/penawaran/search/autocomplete",
                type: "get",
                data: {
                    search: request.term,
                },
                success: function(data) {
                response(data);                },
            });
            },
        });

    });

    $("#barang_col").on('click','#button_hapus',function () {
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