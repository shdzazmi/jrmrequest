<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $requestbarang->tanggal }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $requestbarang->nama }}</p>
</div>

<!-- Kendaraan Field -->
<div class="col-sm-12">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    <p>{{ $requestbarang->kendaraan }}</p>
</div>

<!-- Part Number Field -->
<div class="col-sm-12">
    {!! Form::label('part_number', 'Part Number:') !!}
    <p>{{ $requestbarang->part_number }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $requestbarang->keterangan }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $requestbarang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $requestbarang->updated_at }}</p>
</div>

