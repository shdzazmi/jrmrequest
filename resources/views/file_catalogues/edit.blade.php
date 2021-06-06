@extends('layouts.app')
@section('title', 'Edit File')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit File Catalogue</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($fileCatalogue, ['route' => ['fileCatalogues.update', $fileCatalogue->id], 'method' => 'patch', 'enctype'=>"multipart/form-data"]) !!}

            <div class="card-body">
                <div class="row">
                    @include('file_catalogues.fields_edit')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('fileCatalogues.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
