{!! Form::open(['route' => ['salesOrders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('salesOrders.show', [$id]) }}" class='btn btn-default btn-xs'>
        <i class="far fa-eye"></i>
    </a>
    @if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev")
        <a href="{{ route('salesOrders.edit', [$id]) }}" class='btn btn-default btn-xs'>
            <i class="far fa-edit"></i>
        </a>
        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
    @endif
</div>
{!! Form::close() !!}

