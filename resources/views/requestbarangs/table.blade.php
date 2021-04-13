<style>
    #tbRequest tbody tr:hover{
        /*cursor: pointer;*/
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }

</style>
<div class="table-responsive">
    <table class="table dataTable table-striped" id="tbRequest">
        <thead>
            <tr>
                <th>Tanggal request</th>
                <th>Produk</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number</th>
                <th>Keterangan</th>
                <th>Direquest oleh</th>
                <th colspan="3">Action</th>
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
            $table = $('#tbRequest').DataTable({
                select: true,
                serverside: true,
                ajax: {
                    url: '{{URL::to('requestbarangsall')}}'
                },
                order: [[ 0, "desc" ]],
                oSearch: {"sSearch": "{{$nama}}"},
                columns: [
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'namabarcode', name: 'namabarcode'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'part_number', name: 'part_number'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'user', name: 'user'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
            setInterval( function () {
                $table.ajax.reload(null, false);
            }, 5000 );
        })

    </script>
@endpush
