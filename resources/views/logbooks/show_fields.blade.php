<!-- Id Karyawan Field -->
<div class="col-sm-12">
    {!! Form::label('id_karyawan', 'Id Karyawan:') !!}
    <p>{{ $logbook->id_karyawan }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $logbook->nama }}</p>
</div>

<!-- Waktu Field -->
<div class="col-sm-12">
    {!! Form::label('waktu', 'Waktu:') !!}
    <p>{{ $logbook->waktu }}</p>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $logbook->status }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $logbook->keterangan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $logbook->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $logbook->updated_at }}</p>
</div>

