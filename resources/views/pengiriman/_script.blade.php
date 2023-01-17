<script>
    function selesai(id) {
        let token = $("input[name=_token]").val();
        $.ajax({
            type: "post",
            url: "/pengiriman/" + id + "/satuan",
            data: {
                id: id,
                _token: token
            },
        })
    }

</script>