<script>
    $(document).ready(function() {


    //Create start
        $.ajax({
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            type: "GET",
            success: function(data) {
                $('#provinsi').html('')
                $('#kota').html('')
                $.each(data.provinsi, function(index, item) {
                    $('#provinsi').append('<option value="'+data.provinsi[index].id+'">'+data.provinsi[index].nama+'</option>')
                })
            }
        })

        $('#provinsi').change(function() {
            let id_provinsi = $(this).val()
            $('#provinsi_nama').val($('#provinsi option:selected').text())
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id_provinsi,
                success: function(data) {
                    $('#kota').html('')
                    $('#kecamatan').html('')
                    $.each(data.kota_kabupaten, function(index, item) {
                        $('#kota').append('<option value="'+data.kota_kabupaten[index].id+'">'+data.kota_kabupaten[index].nama+'</option>')
                    })
                }
            })
        })

        $('#kota').change(function() {
            let id_kota = $(this).val()
            $('#kota_nama').val($('#kota option:selected').text());
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id_kota,
                success: function(data) {
                    $('#kecamatan').html('')
                    $.each(data.kecamatan, function(index, item) {
                        $('#kecamatan').append('<option value="'+data.kecamatan[index].id+'">'+data.kecamatan[index].nama+'</option>')
                    })
                }
            })
        })

        $('#kecamatan').change(function() {
            $('#kecamatan_nama').val($('#kecamatan option:selected').text());
        })
        //Create end

        //Edit start
        $.ajax({
            type: "GET",
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success: function(data) {
                $('#provinsi_edit').html('')
                $('#kota_edit').html('')
                $.each(data.provinsi, function(index, item) {
                    $('#provinsi_edit').append('<option value="'+data.provinsi[index].id+'">'+data.provinsi[index].nama+'</option>')
                })
            }
        })

        $('#provinsi_edit').change(function() {
            let id_provinsi = $(this).val()
            $('#provinsi_nama_edit').val($('#provinsi_edit option:selected').text())
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+id_provinsi,
                success: function(data) {
                    $('#kota_edit').html('')
                    $('#kecamatan_edit').html('')
                    $.each(data.kota_kabupaten, function(index, item) {
                        $('#kota_edit').append('<option value="'+data.kota_kabupaten[index].id+'">'+data.kota_kabupaten[index].nama+'</option>')
                    })
                }
            })
        })

        $('#kota_edit').change(function() {
            let id_kota = $(this).val()
            $('#kota_nama_edit').val($('#kota_edit option:selected').text());
            $.ajax({
                type: "GET",
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+id_kota,
                success: function(data) {
                    $('#kecamatan_edit').html('')
                    $.each(data.kecamatan, function(index, item) {
                        $('#kecamatan_edit').append('<option value="'+data.kecamatan[index].id+'">'+data.kecamatan[index].nama+'</option>')
                    })
                }
            })
        })

        $('#kecamatan_edit').change(function() {
            $('#kecamatan_nama_edit').val($('#kecamatan_edit option:selected').text());
        })
        //Edit end

        $(".swal-edit-button").click(function() {
            let id2 = $(this).data("id");
            let token = $("input[name=_token]").val();
            let id = $('#id_customer').val()

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "/customer/" + id +"/detail/" +id2,
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $('#alamat_lengkap_edit').val(data.data.alamat_lengkap);
                    $('#alamat_daerah_edit').val(data.data.alamat_daerah);
                    $('#provinsi_nama_edit').val(data.data.provinsi_nama);
                    $('#kota_nama_edit').val(data.data.kota_nama);
                    $('#kecamatan_nama_edit').val(data.data.kecamatan_nama);
                    $('#id_edit').val(data.data.id)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info Customer.", "warning");
                }
            });
        });

        $("#swal-update-button").click(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let id = $("#swal-update-button").attr("data-id");
            let token = $("input[name=_token]").val();
            let id2 = $('#id_edit').val()

            let alamat_lengkap = $('#alamat_lengkap_edit').val();
            let provinsi = $('#provinsi_nama_edit').val();
            let kota = $('#kota_nama_edit').val();
            let kecamatan = $('#kecamatan_nama_edit').val();

            $.ajax({
                url: "/customer/"+id+"/detail/"+id2+"/update",
                type: "post",
                data: {
                    _token: token,
                    alamat_lengkap: alamat_lengkap,
                    provinsi: provinsi,
                    kota: kota,
                    kecamatan: kecamatan,
                    id : id,
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

        $("form[name='detail_customer_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();
            let id = $('#id_customer').val();
            $.ajax({
                type: "POST",
                url: "/customer/"+id+"/detail/create",
                data: {
                    _token: token,
                    nama_customer: $("#nama_customer").val(),
                    alamat_lengkap: $("#alamat_lengkap").val(),
                    alamat_daerah: $("#alamat_daerah").val(),
                    provinsi: $("#provinsi_nama").val(),
                    kota: $("#kota_nama").val(),
                    kecamatan: $("#kecamatan_nama").val(),
                },
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
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "/customer/" + id + "/delete",
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
    });
</script>