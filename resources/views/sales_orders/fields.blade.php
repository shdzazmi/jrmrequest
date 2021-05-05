
{{--Form pertama--}}
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Customer</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Nama Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('nama', 'Nama:') !!}
                {!! Form::text('nama', null, ['id'=>'nama_input', 'class' => 'form-control']) !!}
            </div>
            <!-- Tanggal Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('tanggal', 'Tanggal:') !!}
                {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal_input']) !!}
            </div>
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
            <!-- status Field -->
            @if(isset($status))
                <div>
                    {!! Form::hidden('status', $status, ['id'=>'status_input', 'style'=>'width=1px']) !!}
                </div>
            @else
                <div>
                    {!! Form::hidden('status', null, ['id'=>'status_input', 'style'=>'width=1px']) !!}
                </div>
            @endif
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
