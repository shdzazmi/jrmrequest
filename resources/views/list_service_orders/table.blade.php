<div class="table-responsive">
    <table class="table" id="listServiceOrders-table">
        <thead>
            <tr>
                <th>Nourut</th>
        <th>Uid</th>
        <th>Barcode</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
        <th>Discount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($listServiceOrders as $listServiceOrder)
            <tr>
                <td>{{ $listServiceOrder->nourut }}</td>
            <td>{{ $listServiceOrder->uid }}</td>
            <td>{{ $listServiceOrder->barcode }}</td>
            <td>{{ $listServiceOrder->harga }}</td>
            <td>{{ $listServiceOrder->qty }}</td>
            <td>{{ $listServiceOrder->subtotal }}</td>
            <td>{{ $listServiceOrder->discount }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['listServiceOrders.destroy', $listServiceOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('listServiceOrders.show', [$listServiceOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('listServiceOrders.edit', [$listServiceOrder->id]) }}" class='btn btn-default btn-xs'>
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
