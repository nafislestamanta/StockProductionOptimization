<script>
    var arrSlcProduct = [];
    var arrSlcMaterial = [];
    var optionProduct = '';
    var optionMaterial = '';
    var arrProduct = [];
    var arrMaterial = [];

    $(document).ready(function() {
        initialize();

        $('.select2').select2();
    })

    function initialize() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('StockOptimization/getCBData') ?>",
            data: {},
            dataType: "JSON",
            success: function(response) {
                $.each(response.product, function(i, v) {
                    optionProduct += `<option value="${v.nama_produk}">${v.nama_produk}</option>`

                    arrSlcProduct.push(v);
                })

                $.each(response.material, function(i, v) {
                    optionMaterial += `<option value="${v.nama_bahan}">${v.nama_bahan}</option>`

                    arrSlcMaterial.push(v);
                })
            }
        })
    }

    function goToPage2() {
        $('.products').each(function() {
            var valueProduct = $(this).val();

            $(valueProduct).each(function(i, v) {
                arrProduct.push(v);
            })
        });

        $('.materials').each(function() {
            var valueMaterial = $(this).val();

            $(valueMaterial).each(function(i, v) {
                arrMaterial.push(v);
            })
        })

        $('#page1').hide();
        $('#page2').show();

        //PAGE 2
        $.each(arrMaterial, function(i, v) {
            // Material
            var str = '';
            var str_product_name = '';
            $.each(arrProduct, function(i, q) {
                str += `<tr>
                            <td>${q}</td>
                            <td><input type="text" id="qtyMaterial" class="form-control qtyMaterial" name="qtyMaterial" data-product="${q}" data-material="${v}" placeholder="Qty Bahan"></td>
                       </tr>`
            })

            $('#multipleMaterial').append(`
                <div class="form-group">
                    <h4 class="card-title">${v}</h4>
                        <div class="table-responsive">
                            <table class="table" id="tableListMultipleMaterial">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Qty (KG)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ${str}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Jumlah Bahan ${v}</th>
                                        <th><input type="text" id="materialMax" class="form-control materialMax" name="materialMax" data-mode="material"  data-material="${v}" placeholder="Jumlah Bahan"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                 `)
        })

        // Processing Time
        str = '';
        $.each(arrProduct, function(i, q) {
            str += `<tr>
                            <td>${q}</td>
                            <td><input type="text" id="qtyProcessingTime" class="form-control qtyProcessingTime" name="qtyProcessingTime" data-product="${q}" placeholder="Waktu Pengerjaan"></td>
                       </tr>`
        })

        $('#ProcessingTime').append(`
                <div class="form-group">
                        <div class="table-responsive">
                            <table class="table" id="tableListProcessingTime">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Waktu Pengerjaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ${str}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Jumlah Waktu Pengerjaan</th>
                                        <th><input type="text" id="processingTimeMax" class="form-control processingTimeMax" name="processingTimeMax" placeholder="Jumlah Waktu Pengerjaan"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                 `)

        // // labor
        // str = '';
        // $.each(arrProduct, function(i, q) {
        //     str += `<tr>
        //                     <td>${q}</td>
        //                     <td><input type="text" id="qtyLabor" class="form-control qtyLabor" name="qtyLabor" data-product="${q}" placeholder="Tenaga Kerja"></td>
        //                </tr>`
        // })

        // $('#labor').append(`
        //         <div class="form-group">
        //                 <div class="table-responsive">
        //                     <table class="table" id="tableListLabor">
        //                         <thead>
        //                             <tr>
        //                                 <th>Nama Produk</th>
        //                                 <th>Tenaga Kerja</th>
        //                             </tr>
        //                         </thead>
        //                         <tbody>
        //                         ${str}
        //                         </tbody>
        //                         <tfoot>
        //                             <tr>
        //                                 <th>Jumlah Tenaga Kerja</th>
        //                                 <th><input type="text" id="qtyLaborMax" class="form-control" name="qtyLaborMax" placeholder="Jumlah Tenaga Kerja"></th>
        //                             </tr>
        //                         </tfoot>
        //                     </table>
        //                 </div>
        //             </div>
        //          `)


        // Production Amount
        str = '';
        $.each(arrProduct, function(i, q) {
            str += `<tr>
                            <td>${q}</td>
                            <td><input type="text" id="qtyProductionAmount" class="form-control qtyProductionAmount" name="qtyProductionAmount" data-product="${q}" placeholder="Qty"></td>
                            <td><input type="text" id="qtyProductionAmountMax" class="form-control qtyProductionAmountMax" name="qtyProductionAmountMax" data-product="${q}" placeholder="Qty"></td>
                       </tr>`
        })

        $('#productionAmount').append(`
                <div class="form-group">
                        <div class="table-responsive">
                            <table class="table" id="tableListProductionAmount">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Qty</th>
                                        <th>Kapasitas Produksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ${str}
                                </tbody>
                            </table>
                        </div>
                    </div>
                `)

        // Profit
        str = '';
        $.each(arrProduct, function(i, q) {
            str += `<tr>
                            <td>${q}</td>
                            <td><input type="text" id="qtyProfit" class="form-control qtyProfit" name="qtyProfit" data-product="${q}" placeholder="Keuntungan"></td>
                       </tr>`
        })

        $('#profit').append(`
                <div class="form-group">
                        <div class="table-responsive">
                            <table class="table" id="tableListProfit">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Keuntungan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ${str}
                                </tbody>
                            </table>
                        </div>
                    </div>
                 `)

    }

    function goToPage3() {
        // THEAD
        var theadX = '';
        var theadS = '';
        var rowZColS = '';
        var totalParameter = arrMaterial.length + arrProduct.length + 1;

        for (let i = 0; i < arrProduct.length; i++) {
            // theadX += `<th>X${i+1}</th>`;
            theadX += `<th>${arrProduct[i]}</th>`;
        }

        for (let j = 0; j < totalParameter; j++) {
            theadS += `<th>S${j+1}</th>`;
            rowZColS += `<td>0</td>`;
        }

        $('#tableFirstData thead').append(`
            <tr>
                <th>Variabel Dasar</th>
                <th>Z</th>
                ${theadX}
                ${theadS}
                <th>NK</th>
            </tr>
        `)
        //END THEAD

        // ROW Z
        var rowZ = '';
        $('.qtyProfit').each(function() {
            rowZ += `<td>-${$(this).val()}</td>`;
        })

        $('#tableFirstData tbody').append(`
            <tr>
                <td>Z</td>
                <td>1</td>
                ${rowZ}
                ${rowZColS}
                <td>0</td>
            </tr>
        `)
        // END ROW Z

        // ROW MATERIAL
        var col = '';
        var rowMaterial = '';
        var s = 0;
        var cekCount = 0;
        $('.qtyMaterial').each(function() {
            var material = $(this).attr('data-material');
            var value = $(this).val()

            if (col != material) {
                rowMaterial += `<tr><td>S${++s}</td><td>0</td><td>${value}</td>`
                    ++cekCount;
            } else {
                rowMaterial += `<td>${value}</td>`
                    ++cekCount;

                if (cekCount == arrProduct.length) {
                    for (let j = 0; j < totalParameter; j++) {
                        if (s == j + 1) {
                            rowMaterial += `<td>1</td>`;
                        } else {
                            rowMaterial += `<td>0</td>`;
                        }
                    }

                    var jumlahBahanMaterial = $(`input[name="materialMax"][data-material="${material}"]`).val();
                    rowMaterial += `<td>${jumlahBahanMaterial}</td></tr>`

                    cekCount = 0;
                }
            }

            col = material;
        })

        $('#tableFirstData tbody').append(rowMaterial);
        // END ROW MATERIAL

        // ROW MAKSIMUM PRODUKSI
        var cekX = 0;
        var rowMaxProduct = '';
        $('#tableListProductionAmount tbody tr').each(function() {
            var qty = $(this).find('input.qtyProductionAmount').val();
            var qtyMax = $(this).find('input.qtyProductionAmountMax').val();

            for (let i = 0; i < arrProduct.length; i++) {
                if (cekX == i) {
                    rowMaxProduct += `<td>${qty}</td>`
                } else {
                    rowMaxProduct += `<td>0</td>`
                }

                if (i + 1 == arrProduct.length) {
                    cekX += 1
                }
            }

            for (let j = 0; j < totalParameter; j++) {
                if (s + 1 == j + 1) {
                    rowMaxProduct += `<td>1</td>`
                } else {
                    rowMaxProduct += `<td>0</td>`
                }
            }

            rowMaxProduct += `<td>${qtyMax}</td>`

            $('#tableFirstData tbody').append(`
                <tr>
                    <td>S${++s}</td>
                    <td>0</td>
                    ${rowMaxProduct}
                </tr>
            `)

            rowMaxProduct = ''

        })
        // END ROW MAKSIMUM PRODUKSI


        // ROW PROCESSING TIME
        var rowProcessingTime = '';
        $('.qtyProcessingTime').each(function() {
            var value = $(this).val();
            rowProcessingTime += `<td>${value}</td>`
        })

        for (let j = 0; j < totalParameter; j++) {
            if (s + 1 == j + 1) {
                rowProcessingTime += `<td>1</td>`
            } else {
                rowProcessingTime += `<td>0</td>`
            }
        }

        var maxProcessingTime = $('#processingTimeMax').val();
        rowProcessingTime += `<td>${maxProcessingTime}</td>`

        $('#tableFirstData tbody').append(`
                <tr>
                    <td>S${++s}</td>
                    <td>0</td>
                    ${rowProcessingTime}
                </tr>
        `)
        // END ROW PROCESSING TIME

        // // ROW LABOR
        // var rowLabor = '';
        // $('.qtyLabor').each(function() {
        //     var value = $(this).val();
        //     rowLabor += `<td>${value}</td>`
        // })

        // for (let j = 0; j < totalParameter; j++) {
        //     if (s + 1 == j + 1) {
        //         rowLabor += `<td>1</td>`
        //     } else {
        //         rowLabor += `<td>0</td>`
        //     }
        // }

        // var maxLabor = $('#qtyLaborMax').val();
        // rowLabor += `<td>${maxLabor}</td>`

        // $('#tableFirstData tbody').append(`
        //         <tr>
        //             <td>S${++s}</td>
        //             <td>0</td>
        //             ${rowLabor}
        //         </tr>
        // `)
        // // END ROW LABOR

        // MENDUPLICATTE TABLE
        var duplicatedTable = $('#tableFirstData').clone();
        var indexTable = 0;

        // Mengatur ID baru untuk tabel yang telah diduplikat
        duplicatedTable.attr('id', `tableSimplex-${indexTable}`);

        // Menambahkan tabel yang telah diduplikat ke dalam dokumen
        $('#addTable').append(`<div class="card" id="cardSimplex-${indexTable}">
                     <div class="card-content">
                         <div class="card-body">
                             <div class="form-vertical">
                                 <div class="form-body">
                                     <h4 class="card-title">Proses Iterasi ${indexTable + 1}</h4>
                                     <hr>
                                     <div class="row">
                                         <div class="table-responsive">
                                             ${duplicatedTable.prop('outerHTML')}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>`);
        // END MENDUPLICATTE TABLE

        // TABLE KEDUA MENEMUKAN KOLOM KUNCI DAN BARIS KUNCI
        var maxNegativeValue = 0;
        var index = 0;
        $(`#tableSimplex-${indexTable} tbody tr:first td`).each(function(i) {
            var value = parseFloat($(this).text());

            if (value < 0) {
                if (maxNegativeValue == 0) {
                    maxNegativeValue = value;
                    index = i;
                } else {
                    if (maxNegativeValue > value) {
                        maxNegativeValue = value;
                        index = i;
                        // console.log(index, maxNegativeValue);
                    }
                }
            }
        });

        $(`#tableSimplex-${indexTable} thead tr`).append('<th>Rasio</th>');

        var minPositiveValue = 0;
        var indexRatio = 0;
        $(`#tableSimplex-${indexTable} tbody tr`).each(function(i) {
            var nkValue = parseFloat($(this).find('td:last').text()); // Nilai dari kolom "NK"
            var colKey = parseFloat($(this).find(`td:nth-child(${index + 1})`).text());
            // console.log(colKey);
            var ratioValue = isFinite(nkValue / colKey) ? nkValue / colKey : 0; // Hitung rasio

            if (i == 0) {
                $(this).append('<td>' + 0 + '</td>'); // Tambahkan nilai rasio ke dalam kolom "Rasio"
            } else {
                $(this).append('<td>' + ratioValue + '</td>'); // Tambahkan nilai rasio ke dalam kolom "Rasio"
            }

            if (ratioValue > 0) {
                if (minPositiveValue > 0) {
                    if (minPositiveValue > ratioValue) {
                        minPositiveValue = ratioValue;
                        indexRatio = i
                        // console.log(minPositiveValue, ratioValue, i);
                    }
                } else {
                    minPositiveValue = ratioValue;
                    indexRatio = i
                }
            }
        });

        var keyColumn = $(`#tableSimplex-${indexTable} tbody tr td:nth-child(${index + 1})`);
        var keyRow = $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`);

        keyColumn.each(function() {
            $(this).css('background-color', 'yellow');
        });

        keyRow.each(function() {
            $(this).css('background-color', 'yellow');
        });

        var nilaiKunci = 0
        $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1}) td:nth-child(${index + 1})`).each(function() {
            $(this).css('background-color', 'green');

            nilaiKunci = parseFloat($(this).text());
        })
        // END MENEMUKAN KOLOM KUNCI DAN BARIS KUNCI

        // RUMUS
        // MENDUPLICATTE TABLE
        var duplicatedTable = $(`#tableSimplex-${indexTable}`).clone();
        ++indexTable

        // Mengatur ID baru untuk tabel yang telah diduplikat
        duplicatedTable.attr('id', `tableSimplex-${indexTable}`);

        // Menambahkan tabel yang telah diduplikat ke dalam dokumen
        $('#addTable').append(`<div class="card" id="cardSimplex-${indexTable}">
                     <div class="card-content">
                         <div class="card-body">
                             <div class="form-vertical">
                                 <div class="form-body">
                                     <h4 class="card-title">Hasil Iterasi ${indexTable}</h4>
                                     <hr>
                                     <div class="row">
                                         <div class="table-responsive">
                                             ${duplicatedTable.prop('outerHTML')}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>`);
        // END MENDUPLICATTE TABLE

        // GET KEY ROW
        var nameThead = ''
        $(`#tableSimplex-${indexTable} thead tr th:nth-child(${index + 1})`).each(function() {
            nameThead = $(this).text()
        })

        var arrKeyRow = [];
        keyRow = $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`);
        keyRow.find('td').each(function(i) {
            var value = parseFloat($(this).text()); // Mendapatkan teks dari setiap elemen td

            if (i == 0) {
                arrKeyRow.push(nameThead)
            } else if (i == 1) {
                arrKeyRow.push(value)
            } else {
                var result = value / nilaiKunci

                if (isFinite(result) == false) {
                    result = 0
                } else {
                    result = result
                }

                arrKeyRow.push(result)
            }
        });
        // END GET KEY ROW

        // IMPLEMENTATION KEY ROW 
        $(`#tableSimplex-${indexTable} tbody tr`).each(function() {
            var key = parseFloat($(this).find(`td:eq(${index})`).text());
            var event = $(this);

            $(arrKeyRow).each(function(i, v) {
                var value = event.find(`td:eq(${i})`).text();
                if (i == 0) {
                    var result = value;
                } else if (i == 1) {
                    var result = value;
                } else {
                    var result = parseFloat(value) - (key * v);
                }

                event.find(`td:eq(${i})`).text(result);
            })
        })

        $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`).each(function() {
            var event = $(this);
            $(arrKeyRow).each(function(i, v) {
                event.find(`td:eq(${i})`).text(v);
            })
        })

        $(`#tableSimplex-${indexTable} thead tr th:last`).each(function() {
            $(this).remove()
        })
        $(`#tableSimplex-${indexTable} tbody tr`).each(function() {
            $(this).find('td:last-child').remove()
            $(this).find('td').removeAttr('style')
            $(this).removeAttr('style');
        })
        // END IMPLEMENTATION KEY ROW

        // CHECK NILAI Z NEGATIVE
        var maxNegativeValue = 0;
        var index = 0;
        $(`#tableSimplex-${indexTable} tbody tr:first td`).each(function(i) {
            var value = parseFloat($(this).text());

            if (value < 0) {
                if (maxNegativeValue == 0) {
                    maxNegativeValue = value;
                    index = i;
                } else {
                    if (maxNegativeValue > value) {
                        maxNegativeValue = value;
                        index = i;
                    }
                }
            }
        });

        if (maxNegativeValue == 0) {
            $(`#tableSimplex-${indexTable} tbody tr`).each(function(i) {
                var valueFirst = $(this).find('td:first').text();
                var valueLast = $(this).find('td:last').text();

                var boolean = arrProduct.includes(valueFirst);

                if (boolean) {
                    $('#tableKesimpulan tbody').append(`
                    <tr>
                        <td>${valueFirst}</td>
                        <td>${valueLast}</td>
                    </tr>
                     `)
                }
            });

            $(`#tableSimplex-${indexTable} tbody tr:first`).each(function(i) {
                var valueFirst = $(this).find('td:first').text();
                var valueLast = $(this).find('td:last').text();

                $('#laba').append(`
                    <tr>
                        <td>Total Laba :</td>
                        <td>${valueLast}</td>
                    </tr>
                 `)
            });
        } else {
            perulanganIterasi(indexTable)
        }

        $('#page2').hide();
        $('#page3').show();
    }

    function perulanganIterasi(indexTable) {
        var viewText = indexTable + 1;
        // MENDUPLICATTE TABLE
        var duplicatedTable = $(`#tableSimplex-${indexTable}`).clone();
        ++indexTable;

        // Mengatur ID baru untuk tabel yang telah diduplikat
        duplicatedTable.attr('id', `tableSimplex-${indexTable}`);

        // Menambahkan tabel yang telah diduplikat ke dalam dokumen
        $('#addTable').append(`<div class="card" id="cardSimplex-${indexTable}">
                     <div class="card-content">
                         <div class="card-body">
                             <div class="form-vertical">
                                 <div class="form-body">
                                     <h4 class="card-title">Proses Iterasi ${viewText}</h4>
                                     <hr>
                                     <div class="row">
                                         <div class="table-responsive">
                                             ${duplicatedTable.prop('outerHTML')}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>`);
        // END MENDUPLICATTE TABLE

        // TABLE KEDUA MENEMUKAN KOLOM KUNCI DAN BARIS KUNCI
        var maxNegativeValue = 0;
        var index = 0;
        $(`#tableSimplex-${indexTable} tbody tr:first td`).each(function(i) {
            var value = parseFloat($(this).text());

            if (value < 0) {
                if (maxNegativeValue == 0) {
                    maxNegativeValue = value;
                    index = i;
                } else {
                    if (maxNegativeValue > value) {
                        maxNegativeValue = value;
                        index = i;
                    }
                }
            }

            if (i + 1 == (arrProduct.length + 2)) {
                return false;
            }
        });

        $(`#tableSimplex-${indexTable} thead tr`).append('<th>Rasio</th>');

        var minPositiveValue = 0;
        var indexRatio = 0;
        $(`#tableSimplex-${indexTable} tbody tr`).each(function(i) {
            var nkValue = parseFloat($(this).find('td:last').text()); // Nilai dari kolom "NK"
            var colKey = parseFloat($(this).find(`td:nth-child(${index + 1})`).text());
            var ratioValue = isFinite(nkValue / colKey) ? nkValue / colKey : 0; // Hitung rasio

            if (i == 0) {
                $(this).append('<td>' + 0 + '</td>'); // Tambahkan nilai rasio ke dalam kolom "Rasio"
            } else {
                $(this).append('<td>' + ratioValue + '</td>'); // Tambahkan nilai rasio ke dalam kolom "Rasio"
            }

            if (ratioValue > 0) {
                if (minPositiveValue > 0) {
                    if (minPositiveValue > ratioValue) {
                        minPositiveValue = ratioValue;
                        indexRatio = i
                        // console.log(minPositiveValue, ratioValue, i);
                    }
                } else {
                    minPositiveValue = ratioValue;
                    indexRatio = i
                }
            }
        });

        var keyColumn = $(`#tableSimplex-${indexTable} tbody tr td:nth-child(${index + 1})`);
        var keyRow = $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`);

        keyColumn.each(function() {
            $(this).css('background-color', 'yellow');
        });

        keyRow.each(function() {
            $(this).css('background-color', 'yellow');
        });

        var nilaiKunci = 0
        $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1}) td:nth-child(${index + 1})`).each(function() {
            $(this).css('background-color', 'green');

            nilaiKunci = parseFloat($(this).text());
        })
        // END MENEMUKAN KOLOM KUNCI DAN BARIS KUNCI

        // RUMUS
        // MENDUPLICATTE TABLE
        var duplicatedTable = $(`#tableSimplex-${indexTable}`).clone();
        ++indexTable

        // Mengatur ID baru untuk tabel yang telah diduplikat
        duplicatedTable.attr('id', `tableSimplex-${indexTable}`);

        // Menambahkan tabel yang telah diduplikat ke dalam dokumen
        $('#addTable').append(`<div class="card" id="cardSimplex-${indexTable}">
                     <div class="card-content">
                         <div class="card-body">
                             <div class="form-vertical">
                                 <div class="form-body">
                                     <h4 class="card-title">Hasil Iterasi ${viewText}</h4>
                                     <hr>
                                     <div class="row">
                                         <div class="table-responsive">
                                             ${duplicatedTable.prop('outerHTML')}
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>`);
        // END MENDUPLICATTE TABLE

        // GET KEY ROW
        var nameThead = ''
        $(`#tableSimplex-${indexTable} thead tr th:nth-child(${index + 1})`).each(function() {
            nameThead = $(this).text()
        })

        var arrKeyRow = [];
        keyRow = $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`);
        keyRow.find('td').each(function(i) {
            var value = parseFloat($(this).text()); // Mendapatkan teks dari setiap elemen td

            if (i == 0) {
                arrKeyRow.push(nameThead)
            } else if (i == 1) {
                arrKeyRow.push(value)
            } else {
                var result = value / nilaiKunci

                if (isFinite(result) == false) {
                    result = 0
                } else {
                    result = result
                }

                arrKeyRow.push(result)
            }
        });
        // END GET KEY ROW

        // IMPLEMENTATION KEY ROW 
        $(`#tableSimplex-${indexTable} tbody tr`).each(function() {
            var key = parseFloat($(this).find(`td:eq(${index})`).text());
            var event = $(this);

            $(arrKeyRow).each(function(i, v) {
                var value = event.find(`td:eq(${i})`).text();
                if (i == 0) {
                    var result = value;
                } else if (i == 1) {
                    var result = value;
                } else {
                    var result = parseFloat(value) - (key * v);
                }

                event.find(`td:eq(${i})`).text(result);
            })
        })

        $(`#tableSimplex-${indexTable} tbody tr:nth-child(${indexRatio + 1})`).each(function() {
            var event = $(this);
            $(arrKeyRow).each(function(i, v) {
                event.find(`td:eq(${i})`).text(v);
            })
        })

        $(`#tableSimplex-${indexTable} thead tr th:last`).each(function() {
            $(this).remove()
        })
        $(`#tableSimplex-${indexTable} tbody tr`).each(function() {
            $(this).find('td:last-child').remove()
            $(this).find('td').removeAttr('style')
            $(this).removeAttr('style');
        })
        // END IMPLEMENTATION KEY ROW

        // CHECK NILAI Z NEGATIVE
        var maxNegativeValue = 0;
        var index = 0;
        $(`#tableSimplex-${indexTable} tbody tr:first td`).each(function(i) {
            var value = parseFloat($(this).text());

            if (value < 0) {
                if (maxNegativeValue == 0) {
                    maxNegativeValue = value;
                    index = i;
                } else {
                    if (maxNegativeValue > value) {
                        maxNegativeValue = value;
                        index = i;
                    }
                }
            }

            if (i + 1 == (arrProduct.length + 2)) {
                return false;
            }
        });

        if (maxNegativeValue == 0) {
            $(`#tableSimplex-${indexTable} tbody tr`).each(function(i) {
                var valueFirst = $(this).find('td:first').text();
                var valueLast = $(this).find('td:last').text();

                var boolean = arrProduct.includes(valueFirst);

                if (boolean) {
                    $('#tableKesimpulan tbody').append(`
                    <tr>
                        <td>${valueFirst}</td>
                        <td>${valueLast}</td>
                    </tr>
                     `)
                }
            });

            $(`#tableSimplex-${indexTable} tbody tr:first`).each(function(i) {
                var valueFirst = $(this).find('td:first').text();
                var valueLast = $(this).find('td:last').text();

                $('#laba').append(`
                    <tr>
                        <td>Total Laba :</td>
                        <td>${valueLast}</td>
                    </tr>
                 `)
            });
        } else {
            perulanganIterasi(indexTable)
        }
    }
</script>