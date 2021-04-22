<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $requestbarang->tanggal }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Produk:') !!}
    <p>{{ $requestbarang->nama }}</p>
</div>

<!-- Barcode Field -->
<div class="col-sm-12">
    {!! Form::label('barcode', 'Barcode:') !!}
    <p>{{ $requestbarang->barcode }}</p>
</div>

<!-- Kendaraan Field -->
<div class="col-sm-12">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    <p>{{ $requestbarang->kendaraan }}</p>
</div>

<!-- Part Number Field -->
<div class="col-sm-12">
    {!! Form::label('partno1', 'Part Number:') !!}
    <p>{{ $requestbarang->partno1 }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $requestbarang->keterangan }}</p>
</div>

<!-- User Field -->
<div class="col-sm-12">
    {!! Form::label('user', 'Direquest oleh:') !!}
    <p>{{ $requestbarang->user }}</p>
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

