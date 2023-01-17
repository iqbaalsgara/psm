<script>
    $("form[name='tarik_data']").submit(function(e) {
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
</script>