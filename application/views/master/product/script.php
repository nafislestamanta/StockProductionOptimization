<script>
    var url = '<?= $this->uri->segment(2); ?>';

    $(document).ready(function() {
        if (url == 'edit') {
            getDataByID('<?= $this->input->get('id') ?>');
        } else if (url == '') {
            getData();
        }
    })

    function getData() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Product/getData') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response.length > 0) {
                    // <td>${v.batas_jumlah_produksi}</td>
                    //         <td>${v.batas_waktu_pengerjaan}</td>
                    //         <td>${v.batas_tenaga_kerja}</td>
                    //         <td>${v.laba}</td>
                    $.each(response, function(i, v) {
                        $('#tableListProduct tbody').append(`
                        <tr>
                            <td>${++i}</td>
                            <td>${v.nama_produk}</td>
                            <td><a href="<?= base_url('Product/edit?id=') ?>${v.id_produk}" title="edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a><button onclick="deleteData('${v.id_produk}')" title="hapus" class="btn btn-danger" style="margin-left: 5px"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    `)
                    })
                } else {
                    $('#tableListProduct tbody').append(`
                        <tr>
                            <td class="text-center" colspan="7">Data Kosong</td>
                        </tr>
                    `)
                }
            }
        })
    }

    function getDataByID(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Product/getDataByID') ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    $('#product_name').val(response.nama_produk)
                    // $('#production_limit').val(response.batas_jumlah_produksi)
                    // $('#work_deadline').val(response.batas_waktu_pengerjaan)
                    // $('#labor_limit').val(response.batas_tenaga_kerja)
                    // $('#product_profit').val(response.laba)
                }
            }
        })
    }

    function save() {
        var product_name = $('#product_name').val();
        // var production_limit = $('#production_limit').val();
        // var work_deadline = $('#work_deadline').val();
        // var labor_limit = $('#labor_limit').val();
        // var product_profit = $('#product_profit').val();

        // Pemeriksaan untuk data kosong
        // || production_limit == '' || work_deadline == '' || labor_limit == '' || product_profit == ''
        if (product_name == '') {
            errorAlert('Data Tidak Boleh Kosong', '', 'info');
            return false; // Menghentikan pengiriman formulir
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('Product/save') ?>",
            data: {
                product_name: product_name,
                // production_limit: production_limit,
                // work_deadline: work_deadline,
                // labor_limit: labor_limit,
                // product_profit: product_profit,
                id_product: url == 'edit' ? '<?= $this->input->get('id') ?>' : '',
                mode: url == 'edit' ? 'update' : 'insert'
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    alertResult('success', 'Data Berhasil Disimpan');

                    window.location.href = '<?= base_url('Product') ?>'
                } else {
                    alertResult('error', 'Data Gagal Disimpan');
                }
            }
        })
    };

    function deleteData(id_product) {
        confirmAlert('Apakah Anda Yakin?', 'Data ingin dihapus', 'warning', 'Iya', 'Tidak').then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Product/deleteData') ?>",
                    data: {
                        id_product: id_product
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response) {
                            alertResult('success', 'Data Berhasil Dihapus');

                            window.location.reload();
                        } else {
                            alertResult('error', 'Data Gagal Dihapus');
                        }
                    }
                })
            }
        })
    }
</script>