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
            url: "<?= base_url('Material/getData') ?>",
            dataType: "JSON",
            success: function(response) {
                if (response.length > 0) {
                    $.each(response, function(i, v) {
                        $('#tableListMaterial tbody').append(`
                        <tr>
                            <td>${++i}</td>
                            <td>${v.nama_bahan}</td>
                            <td><a href="<?= base_url('Material/edit?id=') ?>${v.id_bahan}" title="edit" class="btn btn-warning"><i class="fa fa-pencil"></i></a><button onclick="deleteData('${v.id_bahan}')" title="hapus" class="btn btn-danger" style="margin-left: 5px"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    `)
                    })
                } else {
                    $('#tableListMaterial tbody').append(`
                        <tr>
                            <td class="text-center" colspan="3">Data Kosong</td>
                        </tr>
                    `)
                }
            }
        })
    }

    function getDataByID(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Material/getDataByID') ?>",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    $('#material_name').val(response.nama_bahan)
                }
            }
        })
    }

    function save() {
        var material_name = $('#material_name').val();

        // Pemeriksaan untuk data kosong
        if (material_name == '') {
            errorAlert('Data Tidak Boleh Kosong', '', 'info');
            return false; // Menghentikan pengiriman formulir
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('Material/save') ?>",
            data: {
                material_name: material_name,
                id_material: url == 'edit' ? '<?= $this->input->get('id') ?>' : '',
                mode: url == 'edit' ? 'update' : 'insert'
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    alertResult('success', 'Data Berhasil Disimpan');

                    window.location.href = '<?= base_url('Material') ?>'
                } else {
                    alertResult('error', 'Data Gagal Disimpan');
                }
            }
        })
    };

    function deleteData(material_id) {
        confirmAlert('Apakah Anda Yakin?', 'Data ingin dihapus', 'warning', 'Iya', 'Tidak').then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Material/deleteData') ?>",
                    data: {
                        material_id: material_id
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