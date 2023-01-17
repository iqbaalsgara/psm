<script>
    $(document).ready(function() {
        $(".active_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "/user/" + id,
                // data: {
                //     id: id,
                //     _token: token
                // },
                success: function(data) {
                    $("#modalLabel").html(data.data.name)
                    $("#status_user").html(data.data.status)
                    if (data.data.status == "aktif") {
                        $("#status_button").html(`<a href="/user/${id}/status" class="btn btn-primary">Nonaktifkan</a>`)
                    } else {
                        $("#status_button").html(`<a href="/user/${id}/status" class="btn btn-primary">Aktifkan</a>`)
                    }
                }
            })
        })

        $(".swal-edit-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#id_edit").val(id);

            $.ajax({
                url: "/user/" + id,
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#name_edit").val(data.data.name)
                    $("#email_edit").val(data.data.email)
                    $("#password_edit").val(data.data.password)
                    $("#role_id_edit").val(data.data.role_id)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $("form[name='user_edit']").submit(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let id = $("#id_edit").val();
            let token = $("input[name=_token]").val();
            let formUser = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            $.ajax({
                url: "/user/" + id + "/update",
                type: "post",
                data: formUser,
                cache:false,
                contentType: false,
                processData: false,
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

        $("form[name='user_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();
            var formUser = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });
            $.ajax({
                type: "POST",
                url: "/user/create",
                data: formUser,
                cache:false,
                contentType: false,
                processData: false,
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
                        url: "/user/" + id + "/delete",
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