@extends('layouts.app')
@section('title', 'Tambah File')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Upload File</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'fileCatalogues.store', 'enctype'=>"multipart/form-data"]) !!}

            <div class="card-body">

                <div class="row">
                    @include('file_catalogues.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Upload Files', ['class' => 'btn btn-primary', 'onclick' => "tampilLoading('Uploading...');"]) !!}
                <a href="{{ route('fileCatalogues.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
