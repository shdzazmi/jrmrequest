<!--Table hover and cursor style-->
<style>
    #serviceorderproduk tbody tr:hover{
        cursor: pointer;
    }
    #serviceorderproduk{
        display:none;
    }
</style>

<!-- Table produk -->
<div class="table-responsive p-0" style="max-width: 100%; overflow: auto;">
    <table class="table dataTable display"  id="serviceorderproduk" style="font-size: 14px;">
        <thead>
        <tr style="text-align:center">
            <th>Barcode</th>
            <th>Nama</th>
            <th>Kendaraan</th>
            <th>Part1</th>
            <th>Part2</th>
            <th style="width: 60%">Produk</th>
            <th style="width: 15%">Harga</th>
            <th style="width: 15%">Stok</th>
        </tr>
        </thead>
        <tbody id="tbserviceorder">
        </tbody>
    </table>
</div>


<!-- Modal -->
<!-- The Modal -->
<div class="modal fade" id="qtyModal">
    <div class="modal-dialog modal-dialog-centered modal-sm" style="text-align: center">
        <div class="modal-content p-3">

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col">
                    <label for="qty_input">Masukan Qty:</label><input class="form-control" min="1" type="number" placeholder="Quantity" id="qty_input" autofocus>
                </div>
                <div class="col pt-3">
                    <button type="button" class="btn btn-primary" id="btnConfirm">Confirm</button>
                </div>
                <div class="col" style="font-size: 12px; color: gray">
                    atau tekan enter pada keyboard
                </div>
            </div>
        </div>
    </div>
</div>

@push('page_scripts')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function() {

        let tbProduk = $('#serviceorderproduk').DataTable({
            ajax: {
                url: '{{URL::to('getserviceOrders')}}'
            },
            select: true,
            cache: true,
            serverSide: true,
            order: [[1, "asc"]],
            processing: true,
            autoWidth: false,
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "   Baris: _MENU_"
            },
            columns: [
                {data: 'barcode', name: 'barcode'},
                {data: 'nama', name: 'nama'},
                {data: 'kendaraan', name: 'kendaraan'},
                {data: 'partno1', name: 'partno1'},
                {data: 'partno2', name: 'partno2'},
                {data: 'produk', name: 'produk'},
                {data: 'hargamin', name: 'hargamin', render: $.fn.dataTable.render.number('.', ',', 0, '')},
                {data: 'qtystok', name: 'qtystok'}
            ],
            columnDefs: [
                {
                    targets: [ 0,1,2,3,4 ],
                    visible: false,
                }
            ],
            initComplete: function () {
                $("#serviceorderproduk").show();
            }
        });

        // klik produk di table
        var btnconfirm = $('#btnConfirm');
        var lastResult;
        var qtyInput = document.getElementById('qty_input');
        var rowData;
        $('#serviceorderproduk tbody ').on('click', 'tr', function (e, dt, type, indexes) {
            rowData = null;
            rowData = tbProduk.row(this).data();
            // console.log(rowData.barcode);
            qtyInput.value = '';
            $("#qtyModal").modal("show");
            $('body').on('shown.bs.modal', '#qtyModal', function () {
                $('input:visible:enabled:first', this).focus();
            });
            btnconfirm.on('click', function (e, dt, type, indexes) {
                var qty= $('input[id="qty_input"]').val();
                if (qtyInput.value !== ''){
                    if (rowData !== lastResult) {
                        lastResult = rowData;
                        var url = '{{ route("serviceOrders.put") }}';
                        var data = {
                            uid : document.getElementById( "uid_input" ).value,
                            barcode: rowData.barcode
                        };

                        $.ajax({
                            url: url,
                            method: "POST",
                            data: data,
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                if (data !== "added"){
                                    // Fitur kunci edit data
                                    if (data['c'] === "master"){
                                        $('#table-body').append(
                                            '<tr>' +
                                            '<td style="display:none;"></td>  ' +
                                            '<td style="display:none;">'+ rowData.barcode+'</td>  ' +
                                            '<td style="display:none;">part</td>  ' +
                                            '<td style="vertical-align: middle"><input style="font-size: 12px; width: 220px " type="text" class="form-control form-control-sm" id="namaInput" value="' + data['b'].ketnama + '"></td>  ' +
                                            '<td style="vertical-align: middle;">'+
                                            '<span class="badge bg-primary">'+data['b'].kd_supplier+'</span><br/>'+
                                            'PN1: '+ data['b'].partno1 +'<br/>'+
                                            'PN2: '+ data['b'].partno2 +
                                            '</td>'+
                                            '<td style="vertical-align: middle"><input style="width: 120px; font-size: 12px" type="number" data-a-sign="" data-a-dec="," data-a-sep="." class="form-control form-control-sm" value="'+data['b'].hargamin+'" id="hargaInput" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle"><input style="width: 50px; font-size: 12px" type="number" class="form-control form-control-sm" value="'+qty+'" min="1" id="qtyInput" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle"><input style="width: 50px; font-size: 12px" type="number" class="form-control form-control-sm" value="0" min="1" id="discInput" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle; text-align: right;" class="text">' + data['b'].hargamin * qty + '</td> ' +
                                            '<td style="vertical-align: middle"><input style="width: 60px; font-size: 12px" type="text" class="form-control form-control-sm" id="ketInput"/></td> ' +
                                            '<td style="vertical-align: middle"><button class="btn btn-tool" type="button" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>' +
                                            '<td style="display:none;">'+ data['a'] +'</td>  ' +
                                            '</tr>'
                                        );
                                    } else {
                                        $('#table-body').append(
                                            '<tr>' +
                                                '<td style="display:none;"></td>  ' +
                                                '<td style="display:none;">'+ rowData.barcode +'</td>  ' +
                                                '<td style="display:none;">part</td>  ' +
                                                '<td style="vertical-align: middle"><input style="font-size: 12px; width: 220px" type="text" class="form-control form-control-sm" id="namaInput" value="' + data['b'].ketnama + '"></td>  ' +
                                                '<td style="vertical-align: middle;">'+
                                                '<span class="badge bg-primary">'+data['b'].kd_supplier+'</span><br/>'+
                                                'PN1: '+ data['b'].partno1 +'<br/>'+
                                                'PN2: '+ data['b'].partno2 +
                                                '</td>'+
                                                '<td style="vertical-align: middle"><input style="width: 120px; font-size: 12px" type="number" data-a-sign="" data-a-dec="," data-a-sep="." class="form-control form-control-sm" value="'+data['b'].hargamin+'" id="hargaInput" onchange="updateSubtotal(this);"/></td> ' +
                                                '<td style="vertical-align: middle"><input style="width: 50px; font-size: 12px" type="number" class="form-control form-control-sm" value="'+qty+'" min="1" id="qtyInput" onchange="updateSubtotal(this);"/></td> ' +
                                                '<td style="vertical-align: middle"><input style="width: 50px; font-size: 12px" type="number" class="form-control form-control-sm" value="0" min="1" id="discInput" onchange="updateSubtotal(this);"/></td> ' +
                                                '<td style="vertical-align: middle; text-align: right;" class="text">' + data['b'].hargamin * qty + '</td> ' +
                                                '<td style="vertical-align: middle"><input style="width: 60px; font-size: 12px" type="text" class="form-control form-control-sm" id="ketInput"/></td> ' +
                                                '<td style="vertical-align: middle"><button class="btn btn-tool" type="button" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>' +
                                                '<td style="display:none;">'+ data['a'] +'</td>  ' +
                                            '</tr>'
                                        );
                                    }
                                    toastSuccess("Produk berhasil ditambahkan!")
                                } else {
                                    toastError('Produk sudah ada list order!', '')
                                    // console.log('added')
                                }
                                getTotalPrice();
                            },
                            error: function (data) {
                                toastError("Gagal!", "Terjadi kesalahan internal.")
                                // console.log('internal')
                            }
                        })
                    } else {
                        toastError('Produk sudah ada list order!', '')
                    }
                    $("#qtyModal").modal("hide");
                } else {
                    toastError('Gagal!', 'Isi angka quantity')
                }
            });

        });

        qtyInput.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                btnconfirm.click();
                // Cancel the default action, if needed
                event.preventDefault();
            }
        });

    });
</script>
@endpush
