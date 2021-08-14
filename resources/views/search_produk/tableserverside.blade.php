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
                <th style="width: 10%">Bcode</th>
                <th style="width: 5%">Nama</th>
                <th style="width: 10%">Kendaraan</th>
                <th style="width: 8%">Part Number1</th>
                <th style="width: 8%">Part Number2</th>
                <th style="width: 5%">Harga</th>
                <th style="width: 5%">Stok Total</th>
            </tr>
            </thead>
            <tfoot style="display: table-header-group">
            <tr style="text-align:center">
                <th style="width: 10%">Bcode</th>
                <th style="width: 5%">Nama</th>
                <th style="width: 10%">Kendaraan</th>
                <th style="width: 8%">Part Number1</th>
                <th style="width: 8%">Part Number2</th>
                <th style="width: 5%">Harga</th>
                <th style="width: 5%">Stok Total</th>
            </tr>
            </tfoot>
            <tbody id="tbsearchproduk">
            </tbody>
        </table>
    </div>

@push('page_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    tampilLoading('Memuat...');
    $(document).ready(function() {
        Swal.close();
        // Setup - add a text input to each footer cell
        $('#salesorderproduk tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="search" class="form-control"/>' );
        } );

        const tbProduk = $('#salesorderproduk').DataTable({
            ajax: {
                url: '{{URL::to('searchdata')}}'
            },
            select: true,
            cache: true,
            serverSide: true,
            order: [[0, "asc"]],
            processing: true,
            autoWidth: false,
            columns: [
                {data: 'barcode', name: 'barcode'},
                {data: 'nama', name: 'nama'},
                {data: 'kendaraan', name: 'kendaraan'},
                {data: 'partno1', name: 'partno1'},
                {data: 'partno2', name: 'partno2'},
                {data: 'produk', name: 'produk'},
                {data: 'harga', name: 'harga', render: $.fn.dataTable.render.number('.', ',', 0, '')},
                {data: 'qtystok', name: 'qtystok'}
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
