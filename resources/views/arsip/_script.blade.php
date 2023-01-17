<script>
    $(document).ready(function() {
        $(".detail-button").click(function() {
            let id = $(this).data("id")

            $.ajax({
                type: "GET",
                url: "/surat_jalan/" + id + "/detail",
                // data: {
                //     id: id,
                //     _token: token
                // },
                success: function(data) {
                    $('#detail_table').html('');
                    console.log(data);
                   $.each(data.data, function(key, value) {
                       $('#id_surat_jalan').val('');
                       $('#id_surat_jalan').val(id)
                       $('#detail_table').append(`
                       <tr>
                        <td>${data.data[key].nama_barang}</td>
                        <td>${data.data[key].harga_po}</td>
                        <td>${data.data[key].harga_asli}</td>
                        <td>${data.data[key].unit}</td>
                        <td>${data.data[key].qty}</td>
                        <td>${data.data[key].tgl_beli}</td>
                        </tr>
                       `)
                   })
                }
            })
        })

        $(".swal-arsip-back-button").click(function() {
            Swal.fire({
                title: "Kembalikan?",
                text: "Data Akan dikembalikan ke surat jalan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    let id = $(this).data("id");
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "/arsip/kembalikan",
                        type: "POST",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dikembalikan.",
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
                            Swal.fire("Gagal!", "Data gagal dikembalikan.", "warning");
                        }
                    });
                }
            });
        });
    });
</script>