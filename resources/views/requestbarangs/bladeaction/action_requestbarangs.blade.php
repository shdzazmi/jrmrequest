{!! Form::open(['route' => ['requestbarangs.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('requestbarangs.show', [$id]) }}" class='btn btn-default btn-xs'>
        <i class="far fa-eye"></i>
    </a>
    @if(Auth::user()->role == "Admin")
        <a href="{{ route('requestbarangs.edit', [$id]) }}" class='btn btn-default btn-xs'>
            <i class="far fa-edit"></i>
        </a>
        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'id'=>'delete-data','onclick' => "return confirm('Are you sure?')"]) !!}
    @endif
</div>
{!! Form::close() !!}
