
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Customer</h3>
    </div>
    <div class="card-body pb-1 mb-1 pt-1 mt-1">
        <div class="row">
            <!-- uid Field -->
            @if(isset($uid))
                <div>
                    {!! Form::hidden('uid', $uid, ['id'=>'uid_input', 'style'=>'width=1px']) !!}
                </div>
            @else
                <div>
                    {!! Form::hidden('uid', null, ['id'=>'uid_input', 'style'=>'width=1px']) !!}
                </div>
            @endif
            <!-- id Field -->
            <div>
                {!! Form::hidden('id', null, ['id'=>'id_input', 'style'=>'width=1px']) !!}
            </div>
            <!-- Nama Field -->
            @if(isset($nama))
                <div class="form-group col-sm-6">
                    {!! Form::label('nama', 'Nama:') !!}
                    {!! Form::text('nama', $nama, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']) !!}
                </div>
            @else
                <div class="form-group col-sm-6">
                    {!! Form::label('nama', 'Nama:') !!}
                    {!! Form::text('nama', null, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']) !!}
                </div>
            @endif

            <!-- Mobil Field -->
            @if(isset($mobil))
                <div class="form-group col-sm-6">
                    {!! Form::label('mobil', 'Mobil:') !!}
                    {!! Form::text('mobil', $mobil, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']) !!}
                </div>
            @else
                <div class="form-group col-sm-6">
                    {!! Form::label('mobil', 'Mobil:') !!}
                    {!! Form::text('mobil', null, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']) !!}
                </div>
            @endif

            <!-- Nopol Field -->
            @if(isset($nopol))
                <div class="form-group col-sm-6">
                    {!! Form::label('nopol', 'No. Polisi:') !!}
                    {!! Form::text('nopol', $nopol, ['class' => 'form-control form-control-sm','id'=>'nopol_input']) !!}
                </div>
            @else
                <div class="form-group col-sm-6">
                    {!! Form::label('nopol', 'No. Polisi:') !!}
                    {!! Form::text('nopol', null, ['class' => 'form-control form-control-sm','id'=>'nopol_input']) !!}
                </div>
            @endif

            <!-- Tanggal Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('tanggal', 'Tanggal:') !!}
                {!! Form::text('tanggal', null, ['class' => 'form-control form-control-sm','id'=>'tanggal_input']) !!}
            </div>

            <!-- Operator Field -->
            @if(Auth::user()->name == "Dev")
                <div>
                    {!! Form::hidden('user', null, ['id'=>'operator_input','style'=>'width=1px']) !!}
                </div>
            @else
                <div>
                    {!! Form::hidden('user', Auth::user()->name, ['id'=>'operator_input','style'=>'width=1px']) !!}
                </div>
            @endif
        </div>
    </div>
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_input').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss',
            useCurrent: true,
            sideBySide: true,
            icons: {
                time: "fas fa-clock",
                date: "fas fa-calendar",
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down",
                previous: "fas fa-chevron-left",
                next: "fas fa-chevron-right"
            }
        })

    </script>
@endpush
