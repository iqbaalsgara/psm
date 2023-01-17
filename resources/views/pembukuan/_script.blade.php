<script>

    function pembukuan(id) {
        let token = $("input[name=_token]").val();
        let harga_asli = $("#harga_asli"+id).val();
        let deskripsi = $("#deskripsi"+id).val();
            $.ajax({
            type: "post",
            url: "/pembukuan/" + id + "/satuan",
            data: {
                id: id,
                harga_asli: harga_asli,
                deskripsi: deskripsi,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Saving.",
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
    }

    $(document).ready(function() {
        var total_harga = {!! json_encode($sum) !!};
        $('#total').val(total_harga);

        $('#selesai').on('click', function() {
            let id = $(this).data('id');
            let token = $("input[name=_token]").val();
            $.ajax({
            type: "post",
            url: "/pembukuan/" + id + "/selesai",
            data: {
                id: id,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Saving.",
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
    })

    function terbeli(id) {
        let token = $("input[name=_token]").val();
        $.ajax({
            type: "post",
            url: "/pembukuan/" + id + "/satuan",
            data: {
                id: id,
                _token: token
            },
            success: function(data) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Saving.",
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
    }

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

var total = {!! json_encode($sum) !!};
var total_sub = total.slice(0, total.length - 3);
console.log(total);

$('#terbilang').html(terbilang(total_sub));
</script>