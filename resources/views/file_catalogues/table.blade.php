
<div class="table-responsive">
    <table class="table" id="fileCatalogues-table">
        <thead>
            <tr>
                <th>Title</th>
                @if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" )
                    <th colspan="3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($fileCatalogues as $fileCatalogue)
            <tr>
                <td><a href="{{$fileCatalogue->file_path}}" class='text-dark'>
                        {{ $fileCatalogue->Nama }}
                    </a>
                </td>
                @if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" )
                    <td>
                    {!! Form::open(['route' => ['fileCatalogues.destroy', $fileCatalogue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fileCatalogues.edit', [$fileCatalogue->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@push('page_scripts')
    <script>

        function openPdf(){
            $('#catalogModal').modal('show');
            document.getElementsByClassName("iframepdf").src = '/jrm/public/storage/uploads/1622171098_Sales Order Sadaz SO1_2.pdf#toolbar=0&navpanes=0&scrollbar=0';
        }

    </script>
@endpush
