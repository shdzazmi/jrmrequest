<div class="table-responsive">
    <table class="table dataTable table-striped" id="tbRequestSum">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th class="table-text text-center">Jumlah request</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reqCount as $reqCount)
            <tr>
                <td>{{ $reqCount->nama }}<br/><span class="badge bg-secondary">{{ $reqCount->barcode }}</span></td>
                <td>{{ $reqCount->kd_supplier }}</td>
                <td>{{ $reqCount->kendaraan }}</td>
                <td class="table-text text-center" width="120">
                    <a href="requestbarangsall/{{substr($reqCount->barcode,3)}}" class='btn btn-info btn-sm'>
                        <strong>{{ $reqCount->amount }}</strong>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tbRequestSum').DataTable({
                select: true,
                order: [[3, "desc"]],
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'amount', name: 'amount'},
                ]
            })
        })
    </script>
@endpush
