<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('Nama', 'Nama:') !!}
    <p>{{ $fileCatalogue->Nama }}</p>
</div>

<!-- File Path Field -->
<div class="col-sm-12">
    {!! Form::label('file_path', 'File Path:') !!}
    <p>{{ $fileCatalogue->file_path }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $fileCatalogue->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $fileCatalogue->updated_at }}</p>
</div>

