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
        $("#cari_sj").autocomplete({
                source: function( request, response ) {
                $.ajax({
                    url: "/pembukuan/search/autocomplete",
                    type: "get",
                    dataType: "json",
                    data: {
                        search: request.term,
                        id : {!! json_encode( $id) !!}
                    },
                    success: function(data) {
                        response(data);                
                    },
                });
                },
            });

            $('#button_cari').click(function() {
                var cari_sj = $('#cari_sj').val();
                var id = {!! json_encode( $id)!!}
                location.href = "/pembukuan/cari/data?no_sj="+cari_sj+"&id="+id;
            })
            
        $('#button_tampilkan').click(function() {
            let count = {!! json_encode($count) !!}
            $.ajax({
            type: "get",
            url: "/pembukuan/tampilkan/"+count,
            data: {
                count: count,
            },
            success: function(data) {
               
            },
            })
        })

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
</script>