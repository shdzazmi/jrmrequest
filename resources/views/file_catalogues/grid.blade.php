<style>
    img {
        object-fit: cover;
        height: 100px;
    }


</style>
    @foreach($fileCatalogues as $fileCatalogue)
<div class="card mb-2 shadow">
        @if($fileCatalogue->cover_path == "")
            <a href="{{$fileCatalogue->file_path}}"><span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span></a>
        @else
            <a href="{{$fileCatalogue->file_path}}"><span class="mailbox-attachment-icon has-img"><img src="{{$fileCatalogue->cover_path}}" alt="Cover" style="height: 180px"></span></a>
        @endif
        <div class="mailbox-attachment-info" style="height:100%;">
            <a href="{{$fileCatalogue->file_path}}" class="mailbox-attachment-name"><i class="fas fa-file-pdf"></i> {{$fileCatalogue->Nama}}</a>
            <span class="mailbox-attachment-size mt-1">
                @if(Auth::user()->role == "Dev" || Auth::user()->role == "Master" )
                    {!! Form::open(['route' => ['fileCatalogues.destroy', $fileCatalogue->id], 'method' => 'delete']) !!}

                    <div class="card-tools float-right">
                        <a href="{{ route('fileCatalogues.edit', [$fileCatalogue->id]) }}" type="button" class="btn btn-tool"><i class="far fa-edit"></i></a>

                        <button type="submit" class="btn btn-tool" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                    </div>
                    {!! Form::close() !!}
                @endif
            </span>
        </div>
    </div>
@endforeach
