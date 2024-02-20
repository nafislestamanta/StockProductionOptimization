<script>
    function save() {
        var product_name = $('#product_name').val();
        var production_limit = $('#production_limit').val();
        var work_deadline = $('#work_deadline').val();
        var labor_limit = $('#labor_limit').val();
        var product_profit = $('#product_profit').val();

        // Pemeriksaan untuk data kosong
        if (product_name == '' || production_limit == '' || work_deadline == '' || labor_limit == '' || product_profit == '') {
            errorAlert('Data Tidak Boleh Kosong', '', 'info');
            return false; // Menghentikan pengiriman formulir
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('Product/save') ?>",
            data: {
                product_name: product_name,
                production_limit: production_limit,
                work_deadline: work_deadline,
                labor_limit: labor_limit,
                product_profit: product_profit
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    alertResult('success', 'Data Berhasil Disimpan');
                } else {
                    alertResult('error', 'Data Gagal Disimpan');
                }
            }
        })
    };
</script>