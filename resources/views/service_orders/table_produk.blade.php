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
<div class="table-responsive p-0">
    <table class="table dataTable display"  id="serviceorderproduk">
        <thead>
        <tr style="text-align:center">
            <th>Barcode</th>
            <th style="width: 60%">Produk</th>
            <th style="width: 15%">Harga</th>
            <th style="width: 10%">Stok Total</th>
            <th style="width: 15%">Stok</th>
        </tr>
        </thead>
        <tbody id="tbserviceorder">
        @foreach($produks as $item)
            <tr class='clickable-row'>
                <td>
                    {{ $item['barcode'] }}
                </td>
                <td>
                    {{ $item['ketnama'] }} • {{ $item['kendaraan'] }}<br/>
                    <span class="badge bg-dark">{{ $item['barcode'] }}</span>
                    <span class="badge bg-primary">{{ $item['merek'] }}</span><br/>
                    @if($item['partno1'] != "")
                        <span class="badge badge-pill bg-secondary">1</span> {{ $item['partno1'] }}<br/>
                    @else
                        <span class="badge badge-pill bg-secondary">1</span> -<br/>
                    @endif

                    @if($item['partno2'] != "")
                        <span class="badge badge-pill bg-secondary">2</span> {{ $item['partno2'] }}<br/>
                    @else
                        <span class="badge badge-pill bg-secondary">2</span> -<br/>
                    @endif
                </td>
                <td style="text-align:right">
                    {{ number_format($item['hargamin']) }}
                </td>
                <td style="text-align:right">
                    {{ $item['qty'] }}
                </td>
                <td style="text-align:right">
                    <span class="badge badge-pill bg-info">Tk:</span> {{ $item['qtyTk'] }}<br/>
                    <span class="badge badge-pill bg-info">Gd:</span> {{ $item['qtyGd'] }}<br/>
                </td>
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
        $('#serviceorderproduk tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#serviceorderproduk').DataTable({
            select: true,
            autoWidth: false,
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "   Baris: _MENU_",
            },
            initComplete: function () {
                Swal.close();
                $("#serviceorderproduk").show();
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
        $('#serviceorderproduk tbody ').on('click', 'tr', function (e, dt, type, indexes) {
            rowData = null;
            rowData = tbProduk.row(this).data();
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
                            type : 'part',
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
                                        '<td style="display:none;">part</td>  ' +
                                        '<td style="vertical-align: middle"><input type="text" class="form-control form-control-sm" id="namaInput" value="' + data['b'].nama + '"></td>  ' +
                                        '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="'+data['b'].hargamin+'" style="width: 100px" id="hargaInput" onchange="updateSubtotal(this);"/></td> ' +
                                        '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="'+qty+'" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                        '<td style="vertical-align: middle"><input type="number" class="form-control form-control-sm" value="0" min="1" id="discInput" style="width: 60px" onchange="updateSubtotal(this);"/></td> ' +
                                        '<td style="vertical-align: middle" class="text">' + data['b'].hargamin * qty + '</td> ' +
                                        '<td style="vertical-align: middle"><input type="text" class="form-control form-control-sm" id="ketInput" style="width: 60px"/></td> ' +
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
