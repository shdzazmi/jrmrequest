
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
            <!-- uuid Field -->
            <div>
                @if($uuid==null)
                    {!! Form::hidden('uid', null, ['id'=>'uid_input', 'style'=>'width=1px']) !!}
                @else
                    {!! Form::hidden('uid', $uuid, ['id'=>'uid_input', 'style'=>'width=1px']) !!}
                @endif
            </div>
            <!-- status Field -->
            <div>
                {!! Form::hidden('status', 'Proses', ['id'=>'status_input', 'style'=>'width=1px']) !!}
            </div>
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
