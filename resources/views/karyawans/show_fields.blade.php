<!-- Id Karyawan Field -->
<div class="col-sm-12">
    {!! Form::label('id_karyawan', 'Id Karyawan:') !!}
    <p>{{ $karyawan->id_karyawan }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $karyawan->nama }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $karyawan->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $karyawan->updated_at }}</p>
</div>

