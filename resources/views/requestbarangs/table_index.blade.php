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
                <th class="table-text text-center">Jumlah request</th>
                <th class="table-text text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reqCount as $reqCount)
            <tr class='clickable-row'>
                <td>{{ $reqCount->nama }}<br/><span class="badge bg-secondary">{{ $reqCount->barcode }}</span></td>
                <td>{{ $reqCount->kd_supplier }}</td>
                <td>{{ $reqCount->kendaraan }}</td>
                <td class="table-text text-center" width="120">
                    <a href="requestbarangsall/{{substr($reqCount->barcode,3)}}" class='btn btn-info btn-sm'>
                        <strong>{{ $reqCount->amount }}</strong>
                    </a>
                </td>
                <td class="table-text text-center" width="120">
                    {!! Form::open(['route' => ['destroyAll', substr($reqCount->barcode,3)], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'id'=>'delete-data','onclick' => "return confirm('Hapus semua request produk ini?')"]) !!}
                    {!! Form::close() !!}
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
            $table = $('#tbRequestSum').DataTable({
                select: true,
                order: [[3, "desc"]],
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'kd_supplier', name: 'kd_supplier'},
                    {data: 'kendaraan', name: 'kendaraan'},
                    {data: 'amount', name: 'amount'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            })
        })

    </script>
@endpush
