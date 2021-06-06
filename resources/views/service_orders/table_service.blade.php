<!--Table hover and cursor style-->
<style>
    #jasaservice tbody tr:hover{
        cursor: pointer;
    }
    #jasaservice{
        display:none;
    }
</style>

<!-- Table produk -->
<div class="table-responsive p-0">
    <table class="table dataTable display"  id="jasaservice">
        <thead>
        <tr style="text-align:center">
            <th>Barcode</th>
            <th>Jasa</th>
            <th>Harga</th>
        </tr>
        </thead>
        <tbody id="tbsalesorder">
        @foreach($services as $item)
            <tr class='clickable-row'>
                <td>{{ $item['barcode'] }}</td>
                <td>
                    {{ $item['nama'] }}
                    <span class="badge bg-dark">{{ $item['barcode'] }}</span>
                </td>
                <td style="text-align:right">{{ number_format($item['harga']) }}</td>
            </tr>
        @endforeach
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

        // Setup - add a text input to each footer cell
        $('#jasaservice tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#jasaservice').DataTable({
            select: true,
            order: [[1, "asc"]],
            autoWidth: false,
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            },
            initComplete: function () {
                Swal.close();
                $("#jasaservice").show();
            },
            columnDefs: [
                {
                    targets: [ 0 ],
                    visible: false,
                }
            ]
        });

        // klik produk di table
        var btnconfirm = $('#btnConfirm');
        var lastResult;
        var qtyInput = document.getElementById('qty_input');
        var rowData;
        $('#jasaservice tbody ').on('click', 'tr', function (e, dt, type, indexes) {
            rowData = null;
            rowData = tbProduk.row(this).data();
            qtyInput.value = '';
            if (rowData !== lastResult) {
                lastResult = rowData;
                var url = '{{ route("serviceOrders.puts") }}';
                var data = {
                    uid : document.getElementById( "uid_input" ).value,
                    type : 'service',
                    barcode: rowData[0]
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
                            $('#table-body').append(
                                '<tr>' +
                                '<td style="display:none;">'+ data['a'].id+'</td>  ' +
                                '<td style="display:none;">'+ data['a'].barcode+'</td>  ' +
                                '<td style="display:none;">service</td>  ' +
                                '<td style="vertical-align: middle"><input type="text" class="form-control form-control-sm" id="namaInput" value="' + data['b'].nama + '"></td>  ' +
                                '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="'+data['b'].harga+'" style="width: 100px" id="hargaInput" onchange="updateSubtotal(this);"/></td> ' +
                                '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="1" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="0" min="1" id="discInput" style="width: 60px" onchange="updateSubtotal(this);"/></td> ' +
                                '<td style="vertical-align: middle" class="text">' + data['b'].harga * 1 + '</td> ' +
                                '<td style="vertical-align: middle"><input type="text" class="form-control form-control-sm" id="ketInput"/></td> ' +
                                '<td style="vertical-align: middle"><button class="btn btn-tool" type="button" data-value="'+ data['a'].id +'" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>' +
                                '</tr>'
                            );
                            toastSuccess("Produk berhasil ditambahkan!")
                        } else {
                            toastError('Produk sudah ada list order!', '')
                            console.log('added')
                        }
                        getTotalPrice();
                    },
                    error: function (data) {
                        toastError("Gagal!", "Terjadi kesalahan internal.")
                        console.log('internal')
                    }
                })
            } else {
                toastError('Produk sudah ada list order!', '')
            }

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
