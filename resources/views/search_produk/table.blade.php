<style>
    #salesorderproduk{
        display:none;
    }

</style>
<!-- Table produk -->
    <div style="font-size:14px;" class="card-body table-responsive p-0">
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
                    <td style="width: 10%">
                        {{ $item['nama'] }}<br/>
                        <span class="badge bg-secondary">{{ $item['barcode'] }}</span>
                        <span class="badge bg-primary">{{ $item['merek'] }}</span>
                        @if($item['status'] == 'Aktif')
                            <span class="badge bg-success">{{ $item['status'] }}</span>
                        @else
                            <span class="badge bg-danger">{{ $item['status'] }}</span>
                        @endif
                    </td>
                    <td style="width: 5%">{{ $item['kd_supplier'] }}</td>
                    <td style="width: 10%">{{ $item['kendaraan'] }}</td>
                    <td style="width: 8%">
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
                    <td style="width: 8%">
                        @if($item['lokasi1'] != "")
                            <span class="badge badge-pill bg-secondary">1</span>{{--<a href="javascript:void(0)" onclick="locate('B03-5C')"> --}}{{ $item['lokasi1'] }}{{--</a>--}}<br/>
                        @else
                            <span class="badge badge-pill bg-secondary">1</span> -<br/>
                        @endif

                        @if($item['lokasi2'] != "")
                            <span class="badge badge-pill bg-secondary">2</span>{{--<a href="javascript:void(0)" onclick="locate('D12-2A')">--}} {{ $item['lokasi2'] }}{{--</a>--}}<br/>
                        @else
                            <span class="badge badge-pill bg-secondary">2</span> -<br/>
                        @endif

                        @if($item['lokasi3'] != "")
                            <span class="badge badge-pill bg-secondary">3</span> {{ $item['lokasi3'] }}<br/>
                        @else
                            <span class="badge badge-pill bg-secondary">3</span> -
                        @endif
                    </td>
                    <td style="text-align:right; width: 5%">
                        <span class="badge badge-pill bg-secondary">1</span> {{ number_format($item['harga']) }}<br/>
                        <span class="badge badge-pill bg-secondary">2</span> {{ number_format($item['harga2']) }}<br/>
                        <span class="badge badge-pill bg-secondary">3</span> {{ number_format($item['harga3']) }}<br/>
                        <span class="badge badge-pill bg-secondary">min</span> {{ number_format($item['hargamin']) }}
                    </td>
                    <td style="text-align:right; width: 5%">
                        {{ $item['qty'] }} {{ $item['satuan'] }}
                    </td>
                    <td style="text-align:right; width: 5%">
                        <span class="badge bg-info">Toko:</span> {{ $item['qtyTk'] }}<br/>
                        <span class="badge bg-info">Gudang:</span> {{ $item['qtyGd'] }}<br/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
            processing: true,
            fixedColumns: true,
            deferRender: true,
            cache: true,
            oSearch: {"sSearch": "{{$searchquery}}"},
            columnDefs: [
                { type: 'natural', targets: 6 }
            ],
            initComplete: function () {
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
            },
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            }
        });
    });
</script>
@endpush
