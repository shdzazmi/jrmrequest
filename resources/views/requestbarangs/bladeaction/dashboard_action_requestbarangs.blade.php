@if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head")
    {!! Form::open(['route' => ['destroyAll', $barcode], 'method' => 'delete']) !!}
    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'id'=>'delete-data','onclick' => "return confirm('Hapus semua request produk ini?')"]) !!}
    {!! Form::close() !!}
@endif
