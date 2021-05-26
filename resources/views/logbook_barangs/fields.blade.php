
<!-- Nama Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>
<!-- Driver Field -->
<div class="form-group col-sm-3">
    {!! Form::label('driver', 'Driver:') !!}
    {!! Form::text('driver', null, ['class' => 'form-control']) !!}
</div>
<!-- Plat Field -->
<div class="form-group col-sm-3">
    {!! Form::label('plat', 'Plat:') !!}
    {!! Form::text('plat', null, ['class' => 'form-control']) !!}
</div>
<!-- Tujuan Field -->
<div class="form-group col-sm-3">
    {!! Form::label('tujuan', 'Tujuan:') !!}
    {!! Form::text('tujuan', null, ['class' => 'form-control']) !!}
</div>
<!-- Barcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barcode', 'Kode koli:') !!}
    <div class="input-group">
        <input id="barcode" type="text" class="form-control">
        <span class="input-group-append">
            <button id="submitkodebarang" type="button" class="btn btn-primary" onclick="tambahlist()">Submit</button>
        </span>
    </div>
</div>


