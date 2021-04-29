<style type="text/css">
    
td.details-control {
            text-align:center;
            color:forestgreen;
    cursor: pointer;
}
tr.shown td.details-control {
    text-align:center; 
    color:red;
}

</style>


<div class="table-responsive">
    <table class="table" id="salesOrders-table">
        <thead>
            <tr>
                <th>#</th>
                <th>UID</th>
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
            var table = $('#salesOrders-table').DataTable({
                select: true,
                order: [[2, "desc"]],
                pageLength: 50,
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('salesOrders')}}'
                },
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": '',
                        "render": function () {
                         return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                     },
                    },
                    {data: 'uid', name: 'uid'},
                    {data: 'id', name: 'id'},
                    {data: 'nama', name: 'nama'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: [ 1 ],
                        visible: false
                    }
                ]
            })

            // Add event listener for opening and closing details
            $('#salesOrders-table').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }else {
                    var id = row.data().id;
                    var url = '{{ route("salesOrder.getdetails", ":id") }}';
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: "POST",
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success:
                            function (data) {
                                // Open this row
                                row.child( format(data) ).show();
                                tr.addClass('shown');
                            
                        },
                        error: 
                            function (data) {
                                console.log("eror");
                            
                        }
                    })
                };               

            });
        });

        function format ( d ) {
            // `d` is the original data object for the row
            return '';
        }

    </script>

@endpush

