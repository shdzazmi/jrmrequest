<div class="table-responsive">
    <table class="table" id="salesOrders-table">
        <thead>
            <tr>
                <th>No. Order</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Status</th>
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

        $(document).each( function () {
            $('#salesOrders-table').DataTable({
                select: true,
                pageLength: 50,
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('salesOrders')}}'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        });

    </script>

@endpush

