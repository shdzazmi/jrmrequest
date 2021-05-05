<style>
    #salesorderproduk{
        display:none;
    }

</style>
<!-- Table produk -->
    <div style="font-size:14px;" class="card-body">
        <table style="font-size:14px;" class="table table-bordered dataTable display"  id="salesorderproduk">
            <thead>
            <tr style="text-align:center">
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
                        {{ $item['nama'] }}<br/>
                        <span class="badge bg-secondary">{{ $item['barcode'] }}</span>
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
                            <span class="badge badge-pill bg-secondary">2</span> {{ $item['partno2'] }}
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
                            <span class="badge badge-pill bg-secondary">2</span> {{ $item['lokasi2'] }}
                        @else
                            <span class="badge badge-pill bg-secondary">2</span> -<br/>
                        @endif

                        @if($item['lokasi3'] != "")
                            <span class="badge badge-pill bg-secondary">3</span> {{ $item['lokasi3'] }}
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
                        {{ $item['qty'] }}
                    </td>
                    <td style="text-align:right">
                        <span class="badge badge-pill bg-success">Toko:</span> {{ $item['qtyTk'] }}<br/>
                        <span class="badge badge-pill bg-success">Gudang:</span> {{ $item['qtyGd'] }}<br/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@push('page_scripts')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    tampilLoading('Memuat...');
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#salesorderproduk tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#salesorderproduk').DataTable({
            select: true,
            processing: true,
            autoWidth: false,
            initComplete: function () {
                Swal.close();
                $("#salesorderproduk").show();
                // Apply the
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
            },
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            }
        });

        // Onclick event
        /*var lastResult;
        tbProduk.on('click', 'tr', function (e, dt, type, indexes) {
            var rowData = tbProduk.row(this).data();
            if (rowData !== lastResult) {
                lastResult = rowData;
                var bcode = rowData[0];
                var url = '{{ route("salesOrder.put", ":bcode") }}';
                url = url.replace(':bcode', bcode);
                $.ajax({
                    url: url,
                    method: "POST",
                    data: bcode,
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data) {

                        $('#table-body').append(
                            '<tr>' +
                            '<td style="display:none;"></td>  ' +
                            '<td>' + data.nama + '</td>  ' +
                            '<td>' + data.barcode + '</td> ' +
                            '<td>' + data.kendaraan + '</td> ' +
                            '<td >' +
                                '<div class="input-group-append">'+
                                    '<input type="number" class="form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data.harga +'">'+
                                        '<div  class="dropdown-menu">'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data.harga +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data.harga2 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data.harga3 +'</a>'+
                                            '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data.hargamin +'</a>'+
                                        '</div >'+
                                    '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                '</div>' +
                            '</td> ' +
                            '<td ><input type="number" value="1" min="1" id="qtyInput" style="width: 60px" onchange="updateSubtotal(this);"/></td> ' +
                            '<td class="text">' + data.harga + '</td> ' +
                            '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                            '</tr>'
                        );
                        getTotalPrice();
                        toastSuccess("Produk berhasil ditambahkan!")
                    },
                    error: function (data) {
                        toastError("Gagal!", "Terjadi kesalahan internal.")
                    }
                })
            }
        });*/



    });



</script>
@endpush
