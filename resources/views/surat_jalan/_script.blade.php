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

        $('#surat_jalan_jadwal').select2({
            // theme: 'bootstrap4'            
        });

        $('#detail_all_button').click(function() {
         let id = $('#id_surat_jalan').val();
         console.log(id)
         location.href = "/surat_jalan/"+id+"/detailAll";
     })
//-----------------------------------------------------------------------------------------------------------------------

        //jadwal pengiriman customer
        $('#customer_jadwal').change(function() {
            let id_customer = $(this).val();
            let id_perusahaan = $('#id_perusahaan').val();
            $('#surat_jalan_jadwal').html('');
            $.ajax({
                type: "GET",
                url: "/surat_jalan/"+id_perusahaan+"/jadwal/"+id_customer,
                success: function(data) {
                    console.log(data);
                    $.each(data.data, function(index, item) {
                        $('#surat_jalan_jadwal').append('<option value="'+data.data[index].id+'">'+data.data[index].no_sj+'</option>')
                    })
                }
            })
        })
//-----------------------------------------------------------------------------------------------------------------------
        // $('#harga_po1').keyup(function() {
        //     var numb = $(this).val();
        //     var str = numb.toString().split(".");
        //     str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //     $('#harga_po1').val(str.join("."));
        // })

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


        $('#po').on('keyup', function() {
         var param1 = 'po';
         var  param2 = this.value;
         let id_perusahaan = $("#id_perusahaan").val();
         $('#po_text').removeAttr('class');
         $('#po_text').html('')
         $.ajax({
            url: "/surat_jalan/"+id_perusahaan+"/fillter/"+param1+"/"+param2,
            type: "GET",
            success: function(data) {
                $('#po_text').attr('class', data.class);
                $('#po_text').html(data.text)
            },
            error: function(data) {
                console.log(data)
            }
        });
     });

        $('#po_edit').on('keyup', function() {
         var param1 = 'po';
         var  param2 = this.value;
         let id_perusahaan = $("#id_perusahaan").val();
         $('#po_edit_text').removeAttr('class');
         $('#po_edit_text').html('')
         $.ajax({
            url: "/surat_jalan/"+id_perusahaan+"/fillter/"+param1+"/"+param2,
            type: "GET",
            success: function(data) {
                $('#po_edit_text').attr('class', data.class);
                $('#po_edit_text').html(data.text)
            },
            error: function(data) {
                console.log(data)
            }
        });
     });

        $('#pr').on('keyup', function() {
         var param1 = 'pr';
         var  param2 = this.value;
         let id_perusahaan = $("#id_perusahaan").val();
         $('#pr_text').removeAttr('class');
         $('#pr_text').html('')
         $.ajax({
            url: "/surat_jalan/"+id_perusahaan+"/fillter/"+param1+"/"+param2,
            type: "GET",
            success: function(data) {
                $('#pr_text').attr('class', data.class);
                $('#pr_text').html(data.text)
            },
            error: function(data) {
                console.log(data)
            }
        });
     });

        $('#pr_edit').on('keyup', function() {
         var param1 = 'pr';
         var  param2 = this.value;
         let id_perusahaan = $("#id_perusahaan").val();
         $('#pr_edit_text').removeAttr('class');
         $('#pr_edit_text').html('')
         $.ajax({
            url: "/surat_jalan/"+id_perusahaan+"/fillter/"+param1+"/"+param2,
            type: "GET",
            success: function(data) {
                $('#pr_edit_text').attr('class', data.class);
                $('#pr_edit_text').html(data.text)
            },
            error: function(data) {
                console.log(data)
            }
        });
     });

        const d = new Date();

        function bulan(bulan) {
            var data = ['I',"II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];

            var romawi = data[bulan];
            return romawi; 
        }
        
        var sj_count = {!! json_encode($surat_jalan_count) !!} + 1;
        var singkatan = {!! json_encode($singkatan) !!};
        var no_sj = "0"+sj_count+"/SJ/"+singkatan+"/"+bulan(d.getMonth())+"/"+d.getFullYear();

        $('#no_sj').val(no_sj);

        $(".swal-edit-button").click(function() {
            let token = $("input[name=_token]").val();
            let id2 = $(this).data("id");
            let id = $("#id_perusahaan").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "/surat_jalan/"+id+"/perusahaan/"+id2,
                type: "GET",
                data: {
                    id: id,
                    id2:id2,
                    _token: token
                },
                success: function(data) {
                    $('#no_sj_edit').val(data.data.no_sj);
                    $('#po_edit').val(data.data.po);
                    $('#pr_edit').val(data.data.pr);
                    $('#note_edit').val(data.data.note);
                    $('#tgl_invoice_edit').val(data.data.tgl_invoice);
                    $('#id_edit').val(id2);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info Detail Surat Jalan.", "warning");
                }
            });
        });

        $(".detail-button").click(function() {
            let id = $(this).data("id")
            let id_perusahaan = $("#id_perusahaan").val();
            $.ajax({
                type: "GET",
                url: "/surat_jalan/" + id + "/detail",
                // data: {
                //     id: id,
                //     _token: token
                // },
                success: function(data) {
                    $('#id_detail_surat_jalan').val('');
                    $('#id_detail_surat_jalan').val(id);
                    $('#detail_table').html('');
                    console.log(data);
                    $.each(data.data, function(key, value) {
                       $('#id_surat_jalan').val('');
                       $('#id_surat_jalan').val(id)
                       $('#detail_table').append(`
                           <tr>
                           <td>${data.data[key].nama_barang}</td>
                           <td align="right">${data.data[key].harga_po}</td>
                           <td align="center">${data.data[key].unit}</td>
                           <td align="center">${data.data[key].qty}</td>
                           <td align="center">${data.data[key].statusitem}</td>
                           <td align="center">${data.data[key].tgl_beli}</td>
                           </tr>
                           `)
                       //<td align="right">${data.data[key].harga_asli}</td>
                   })
                }
            })
        })

        $("form[name='surat_jalan_edit']").submit(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let token = $("input[name=_token]").val();
            let id = $('#swal-update-button').data("id");
            let id_perusahaan = $("#id_perusahaan").val();
            var formData = new FormData(this);

            $.ajax({
                url: "/surat_jalan/"+id_perusahaan+"/perusahaan/update",
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

        $("form[name='surat_jalan_create']").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id_perusahaan = $("#id_perusahaan").val();
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "/surat_jalan/"+id_perusahaan+"/perusahaan/create",
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
                        url: "/surat_jalan/"+id_perusahaan+"/perusahaan/"+id+"/delete",
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

        $(".swal-check-button").click(function() {
            Swal.fire({
                title: "Konfirmasi Pengiriman?",
                text: "Pastikan anda telah menerima Surat jalan.",
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
                        url: "/surat_jalan/"+id_perusahaan+"/perusahaan/"+id+"/check",
                        type: "POST",
                        data: {
                            id: id,
                            _token: token
                        },
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
                            }, 500);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });
        
        $(".swal-arsip-button").click(function() {
            Swal.fire({
                title: "Arsip Surat Jalan?",
                text: "Pastikan data telah lengkap.",
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
                        url: "/surat_jalan/"+id_perusahaan+"/perusahaan/"+id+"/arsip",
                        type: "POST",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil diarsip.",
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
            var barang_col = $('#barang_col');
        // $('#hidden_number').val(number);
        $(barang_col).append(`
            <div id="form-barang-${number}"  class="row">
            <div class="col-lg-4">
            <div class="form-group">
            <input type="hidden" id="hidden_number" value="${number}">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang[]" onkeyup=" var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="nama_barang${number}" autocomplete="off">
            </div>
            </div>
            <div class="col-lg-2">
            <div class="form-group">
            <label for="">Qty</label>
            <input type="number" class="form-control" name="qty[]" id="qty${number}">
            </div>
            </div>
            <div class="col-lg-2">
            <div class="form-group">
            <label for="">Unit</label>
            <input type="text" class="form-control" name="unit[]" autocomplete="off"  onkeyup=" var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" id="unit${number}">
            </div>
            
            </div>
            <div class="col-lg-3">
            <div class="form-group">
            <label for="">Harga PO</label>
            <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">Rp.</span>
            </div>
            <input type="text" autocomplete="off" class="form-control numbering" name="harga_po[]" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="harga_po${number}">
            </div>
            </div>
            </div>
            <div class="col-lg-1">
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

function terbilang(bilangan) {

    bilangan    = String(bilangan);
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

    var panjang_bilangan = bilangan.length;

    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kaLimat = "Diluar Batas";
      return kaLimat;
  }

  /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
  for (i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-(i),1);
  }

  i = 1;
  j = 0;
  kaLimat = "";


  /* mulai proses iterasi terhadap array angka */
  while (i <= panjang_bilangan) {

      subkaLimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";

      /* untuk Ratusan */
      if (angka[i+2] != "0") {
        if (angka[i+2] == "1") {
          kata1 = "Seratus";
      } else {
          kata1 = kata[angka[i+2]] + " Ratus";
      }
  }

  /* untuk Puluhan atau Belasan */
  if (angka[i+1] != "0") {
    if (angka[i+1] == "1") {
      if (angka[i] == "0") {
        kata2 = "Sepuluh";
    } else if (angka[i] == "1") {
        kata2 = "Sebelas";
    } else {
        kata2 = kata[angka[i]] + " Belas";
    }
} else {
  kata2 = kata[angka[i+1]] + " Puluh";
}
}

/* untuk Satuan */
if (angka[i] != "0") {
    if (angka[i+1] != "1") {
      kata3 = kata[angka[i]];
  }
}

/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
    subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
}

/* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
kaLimat = subkaLimat + kaLimat;
i = i + 3;
j = j + 1;

}

/* mengganti Satu Ribu jadi Seribu jika diperlukan */
if ((angka[5] == "0") && (angka[6] == "0")) {
  kaLimat = kaLimat.replace("Satu Ribu","Seribu");
}

return kaLimat + "Rupiah";
}
</script>