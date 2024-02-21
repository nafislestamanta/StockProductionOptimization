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
            url: "<?= base_url('Recipe/getData') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $('#tableListRecipe tbody').append(`
                        <tr>
                            <td>${++i}</td>
                            <td>${v.nama_produk}</td>
                            <td>${v.nama_bahan}</td>
                            <td>${v.batas_jumlah_bahan}</td>
                            <td><a href="<?= base_url('Recipe/edit?id=') ?>${v.id_resep}" title="edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a><button onclick="deleteData('${v.id_resep}')" title="hapus" class="btn btn-danger" style="margin-left: 5px"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    `)
                    })
                } else {
                    $('#tableListRecipe tbody').append(`
                        <tr>
                            <td class="text-center" colspan="5">Data Kosong</td>
                        </tr>
                    `)
                }
            }
        })
    }

    function getDataByID(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Recipe/getDataByID') ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    $('#product').val(response.id_produk).trigger('change');
                    $('#material').val(response.id_bahan).trigger('change')
                    $('#limit_material').val(response.batas_jumlah_bahan)
                }
            }
        })
    }

    function save() {
        var product = $('#product').val();
        var material = $('#material').val();
        var limit_material = $('#limit_material').val();

        // Pemeriksaan untuk data kosong
        if (product == '' || material == '' || limit_material == '') {
            errorAlert('Data Tidak Boleh Kosong', '', 'info');
            return false; // Menghentikan pengiriman formulir
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('Recipe/save') ?>",
            data: {
                product: product,
                material: material,
                limit_material: limit_material,
                id_recipe: url == 'edit' ? '<?= $this->input->get('id') ?>' : '',
                mode: url == 'edit' ? 'update' : 'insert'
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    alertResult('success', 'Data Berhasil Disimpan');

                    window.location.href = '<?= base_url('Recipe') ?>'
                } else {
                    alertResult('error', 'Data Gagal Disimpan');
                }
            }
        })
    };

    function deleteData(id_recipe) {
        confirmAlert('Apakah Anda Yakin?', 'Data ingin dihapus', 'warning', 'Iya', 'Tidak').then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Recipe/deleteData') ?>",
                    data: {
                        id_recipe: id_recipe
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