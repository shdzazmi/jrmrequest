<!--Table hover and cursor style-->
<style>
    #salesorderproduk tbody tr:hover{
        cursor: pointer;
    }
    #salesorderproduk{
        display:none;
    }
</style>

<!-- Table produk -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pilih produk</h3>
    </div>
    <div style="font-size:14px;" class="card-body">
        <div class="table-responsive">
            <table class="table dataTable display"  id="salesorderproduk">
                <thead>
                <tr style="text-align:center">
                    <th>Barcode</th>
                    <th style="width: 10%">Produk</th>
                    <th style="width: 5%">Kode Supplier</th>
                    <th style="width: 10%">Kendaraan</th>
                    <th style="width: 8%">Part Number</th>
                    <th style="width: 8%">Lokasi</th>
                    <th style="width: 5%">Harga</th>
                    <th style="width: 5%">Stok Total</th>
                    <th style="width: 5%">Stok</th>
                </tr>
                </thead>
                <tfoot style="display: table-header-group">
                <tr style="text-align:center">
                    <th>Barcode</th>
                    <th style="width: 15%">Produk</th>
                    <th style="width: 5%">Kode Supplier</th>
                    <th style="width: 10%">Kendaraan</th>
                    <th style="width: 5%">Part Number</th>
                    <th style="width: 5%">Lokasi</th>
                    <th style="width: 5%">Harga</th>
                    <th style="width: 2%">Stok Total</th>
                    <th style="width: 2%">Stok</th>
                </tr>
                </tfoot>
                <tbody id="tbsalesorder">
                @foreach($produks as $item)
                    <tr class='clickable-row'>
                        <td>
                            {{ $item['barcode'] }}
                        </td>
                        <td>
                            {{ $item['nama'] }}<br/>
                            <span class="badge bg-secondary">{{ $item['barcode'] }}</span>
                            <span class="badge bg-primary">{{ $item['merek'] }}</span>
                            @if($item['status'] == 'Aktif')
                                <span class="badge bg-success">{{ $item['status'] }}</span>
                            @else
                                <span class="badge bg-danger">{{ $item['status'] }}</span>
                            @endif
                        </td>
                        <td>{{ $item['kd_supplier'] }}</td>
                        <td>{{ $item['kendaraan'] }}</td>
                        <td>
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
                        <td>
                            @if($item['lokasi1'] != "")
                                <span class="badge badge-pill bg-secondary">1</span> {{ $item['lokasi1'] }}<br/>
                            @else
                                <span class="badge badge-pill bg-secondary">1</span> -<br/>
                            @endif

                            @if($item['lokasi2'] != "")
                                <span class="badge badge-pill bg-secondary">2</span> {{ $item['lokasi2'] }}<br/>
                            @else
                                <span class="badge badge-pill bg-secondary">2</span> -<br/>
                            @endif

                            @if($item['lokasi3'] != "")
                                <span class="badge badge-pill bg-secondary">3</span> {{ $item['lokasi3'] }}<br/>
                            @else
                                <span class="badge badge-pill bg-secondary">3</span> -<br/>
                            @endif
                        </td>
                        <td style="text-align:right">
                            <span class="badge badge-pill bg-secondary">1</span> {{ number_format($item['harga']) }}<br/>
                            <span class="badge badge-pill bg-secondary">2</span> {{ number_format($item['harga2']) }}<br/>
                            <span class="badge badge-pill bg-secondary">3</span> {{ number_format($item['harga3']) }}<br/>
                            <span class="badge badge-pill bg-secondary">min</span> {{ number_format($item['hargamin']) }}
                        </td>
                        <td style="text-align:right">
                            {{ $item['qty'] }} {{ $item['satuan'] }}
                        </td>
                        <td style="text-align:right">
                            <span class="badge badge-pill bg-info">Toko:</span> {{ $item['qtyTk'] }}<br/>
                            <span class="badge badge-pill bg-info">Gudang:</span> {{ $item['qtyGd'] }}<br/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/natural.js"></script>
<script>

    $(document).ready(function() {

        // Setup - add a text input to each footer cell
        $('#salesorderproduk tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#salesorderproduk').DataTable({
            select: true,
            order: [[1, "asc"]],
            autoWidth: false,
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            },
            columnDefs: [
                { targets: [ 0 ], visible: false},
                { targets: 7, type: 'natural'  }
            ],
            initComplete: function () {
                // $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
                $("#salesorderproduk").show();
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });

        // klik produk di table
        var btnconfirm = $('#btnConfirm');
        var lastResult;
        var qtyInput = document.getElementById('qty_input');
        var rowData;
        $('#salesorderproduk tbody ').on('click', 'tr', function (e, dt, type, indexes) {
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
                        var url = '{{ route("salesOrder.put") }}';
                        var data = {
                            uid : document.getElementById( "uid_input" ).value,
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
                                    var tipeharga = $('#tipeharga').find(":selected").val();
                                    if (tipeharga === '1'){
                                        $('#table-body').append(
                                            '<tr>' +
                                            '<td style="display:none;">'+ data['a'].id+'</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].nama + '</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].barcode + '</td> ' +
                                            '<td style="vertical-align: middle;">' + data['a'].kendaraan + '</td> ' +
                                            '<td style="vertical-align: middle;">' +
                                            '<div class="input-group-append">'+
                                            '<input type="number" class="form-control form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data['b'].harga +'">'+
                                            '<div  class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data['b'].harga +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data['b'].harga2 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data['b'].harga3 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data['b'].hargamin +'</a>'+
                                            '</div >'+
                                            '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                            '</div>' +
                                            '</td> ' +
                                            '<td style="vertical-align: middle; width: 50px"><input class="form-control form-control-sm"  type="number" value="'+qty+'" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle;" class="text">' + data['b'].harga * qty + '</td> ' +
                                            '<td style="vertical-align: middle;"><input class="form-control form-control-sm"  type="text" value="" id="ketInput"/></td> ' +
                                            '<td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="'+ data['a'].id +'" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                            '</tr>'
                                        );

                                        toastSuccess("Produk berhasil ditambahkan!")
                                    } else if(tipeharga === '2'){
                                        $('#table-body').append(
                                            '<tr>' +
                                            '<td style="display:none;">'+ data['a'].id+'</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].nama + '</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].barcode + '</td> ' +
                                            '<td style="vertical-align: middle;">' + data['a'].kendaraan + '</td> ' +
                                            '<td style="vertical-align: middle;">' +
                                            '<div class="input-group-append">'+
                                            '<input type="number" class="form-control form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data['b'].harga2 +'">'+
                                            '<div  class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data['b'].harga +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data['b'].harga2 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data['b'].harga3 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data['b'].hargamin +'</a>'+
                                            '</div >'+
                                            '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                            '</div>' +
                                            '</td> ' +
                                            '<td style="vertical-align: middle; width: 50px"><input class="form-control form-control-sm"  type="number" value="'+qty+'" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle;" class="text">' + data['b'].harga2 * qty + '</td> ' +
                                            '<td style="vertical-align: middle;"><input class="form-control form-control-sm"  type="text" value="" id="ketInput"/></td> ' +
                                            '<td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="'+ data['a'].id +'" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                            '</tr>'
                                        );
                                        toastSuccess("Produk berhasil ditambahkan!")
                                    } else if(tipeharga === '3'){
                                        $('#table-body').append(
                                            '<tr>' +
                                            '<td style="display:none;">'+ data['a'].id+'</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].nama + '</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].barcode + '</td> ' +
                                            '<td style="vertical-align: middle;">' + data['a'].kendaraan + '</td> ' +
                                            '<td style="vertical-align: middle;">' +
                                            '<div class="input-group-append">'+
                                            '<input type="number" class="form-control form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data['b'].harga3 +'">'+
                                            '<div  class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data['b'].harga +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data['b'].harga2 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data['b'].harga3 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data['b'].hargamin +'</a>'+
                                            '</div >'+
                                            '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                            '</div>' +
                                            '</td> ' +
                                            '<td style="vertical-align: middle; width: 50px"><input class="form-control form-control-sm"  type="number" value="'+qty+'" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle;" class="text">' + data['b'].harga3 * qty + '</td> ' +
                                            '<td style="vertical-align: middle;"><input class="form-control form-control-sm"  type="text" value="" id="ketInput"/></td> ' +
                                            '<td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="'+ data['a'].id +'" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                            '</tr>'
                                        );
                                        toastSuccess("Produk berhasil ditambahkan!")
                                    } else if(tipeharga === '4'){
                                        $('#table-body').append(
                                            '<tr>' +
                                            '<td style="display:none;">'+ data['a'].id+'</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].nama + '</td>  ' +
                                            '<td style="vertical-align: middle;">' + data['a'].barcode + '</td> ' +
                                            '<td style="vertical-align: middle;">' + data['a'].kendaraan + '</td> ' +
                                            '<td style="vertical-align: middle;">' +
                                            '<div class="input-group-append">'+
                                            '<input type="number" class="form-control form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data['b'].hargamin +'">'+
                                            '<div  class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data['b'].harga +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data['b'].harga2 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data['b'].harga3 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data['b'].hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data['b'].hargamin +'</a>'+
                                            '</div >'+
                                            '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                            '</div>' +
                                            '</td> ' +
                                            '<td style="vertical-align: middle; width: 50px"><input class="form-control form-control-sm"  type="number" value="'+qty+'" min="1" id="qtyInput" style="width: 50px" onchange="updateSubtotal(this);"/></td> ' +
                                            '<td style="vertical-align: middle;" class="text">' + data['b'].hargamin * qty + '</td> ' +
                                            '<td style="vertical-align: middle;"><input class="form-control form-control-sm"  type="text" value="" id="ketInput"/></td> ' +
                                            '<td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="'+ data['a'].id +'" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                                            '</tr>'

                                        );
                                        toastSuccess("Produk berhasil ditambahkan!")
                                        // console.log('sukses')
                                    } else {
                                        toastError('Gagal!', 'Harga tidak ditemui')
                                        // console.log('harga')
                                    }
                                } else {
                                    toastError('Produk sudah ada list order!', '')
                                    // console.log('added')
                                }
                                getTotalPrice();
                                // console.log('get total')
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
