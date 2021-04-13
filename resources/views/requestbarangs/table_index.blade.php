<style>
    #tbRequestSum tbody tr:hover{
        /*cursor: pointer;*/
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }

</style>
<div class="table-responsive">
    <table class="table dataTable table-striped" id="tbRequestSum">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Jumlah request</th>
                <th>Action</th>
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
            $table = $('#tbRequestSum').DataTable({
                select: true,
                order: [[3, "desc"]],
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('requestbarangs')}}'
                },
                columns: [
                    {data: 'namabarcode', name: 'namabarcode'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'amount', name: 'amount'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
            setInterval( function () {
                $table.ajax.reload(null, false);
            }, 5000 );
        })

    </script>
@endpush
