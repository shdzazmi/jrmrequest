<div class="table-responsive">
    <table class="table" id="salesOrders-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>No Telepon</th>
        <th>Tanggal</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salesOrders as $salesOrder)
            <tr>
                <td>{{ $salesOrder->nama }}</td>
            <td>{{ $salesOrder->no_telepon }}</td>
            <td>{{ $salesOrder->tanggal }}</td>
            <td>{{ $salesOrder->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['salesOrders.destroy', $salesOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('salesOrders.show', [$salesOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('salesOrders.edit', [$salesOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
