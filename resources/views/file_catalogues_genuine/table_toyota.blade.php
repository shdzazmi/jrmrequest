<style>
    #tbtoyota{
        display:none;
    }
</style>

<!-- Table produk simple-->
<div class="card-body table-responsive p-0 pb-2">
    <table style="table-layout: fixed;" class="table dataTable display"  id="tbtoyota">
        <thead>
        <tr style="text-align:center">
            <th style="width: 30%">Produk</th>
            <th style="width: 15%">PN1</th>
            <th style="width: 15%">PN2</th>
            <th style="width: 20%">Kendaraan</th>
            <th style="width: 10%">Harga</th>
            <th style="width: 10%">Merek</th>
        </tr>
        </thead>
        <tfoot style="display: table-header-group">
        <tr style="text-align:center">
            <th style="width: 30%">Produk</th>
            <th style="width: 15%">PN1</th>
            <th style="width: 15%">PN2</th>
            <th style="width: 20%">Kendaraan</th>
            <th style="width: 10%">Harga</th>
            <th style="width: 10%">Merek</th>
        </tr>
        </tfoot>
        <tbody class="p-0 m-0">
        </tbody>
    </table>
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        // tampilLoading('Memuat...');
        $(document).ready(function() {
            $('#tbtoyota tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="search" class="form-control"/>' );
            } );

            const tbProduk = $('#tbtoyota').DataTable({
                order: [[0, "asc"]],
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('produkgenuine-toyota')}}'
                },
                cache: true,
                serverSide: true,
                processing: true,
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'partno1', name: 'partno1'},
                    {data: 'partno2', name: 'partno2'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'harga', name: 'harga', render: $.fn.dataTable.render.number('.', ',', 0, '')},
                    {data: 'merek', name: 'merek'}
                ],
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                },
                initComplete: function () {
                    Swal.close();
                    $("#tbtoyota").show();
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
        });
    </script>
@endpush
