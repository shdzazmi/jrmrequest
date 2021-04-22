<style>
    #tbRequest tbody tr:hover{
        /*cursor: pointer;*/
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }

</style>
<div class="table-responsive">
    <table class="table dataTable table-striped cell-border" id="tbSearch">
        <thead>
            <tr>
                <th class="text-center" style="width:25%">Nama</th>
                <th class="text-center" style="width:10%">Supplier</th>
                <th class="text-center" style="width:15%">Kendaraan</th>
                <th class="text-center" style="width:15%">Part Number</th>
                <th class="text-center" style="width:15%">Lokasi</th>
                <th class="text-center" style="width:15%">Harga</th>
                <th class="text-center" style="width:5%">Qty</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#tbSearch').DataTable({
                serverside: true,
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('search')}}',
                },
                // ajax: "scripts/server_processing.php",
                draw: 10,
                oSearch: {"sSearch": "{{$nama = null}}"},
                columns: [
                    {data: 0, name: 'nama'},
                    {data: 2, name: 'kd_supplier'},
                    {data: 3, name: 'kendaraan'},
                    {data: 4, name: 'partno1'},
                    {data: 5, name: 'lokasi'},
                    {data: 6, name: 'harga'},
                    {data: 7, name: 'qty'},
                ]
            })
            $('#searchInput').on( 'keyup', function () {
                table.search( this.value ).draw();
            } );
            $('#searchButton').on( 'click', function () {
                table.search( this.value ).draw();
            } );
            $(".dataTables_filter").hide();
        })

    </script>
@endpush
