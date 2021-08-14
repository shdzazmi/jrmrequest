<style>
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title">Data Customer</h5>
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
            <!-- status Field -->
            @if(isset($status))
                <div>
                    {!! Form::hidden('status', $status, ['id'=>'status_input', 'style'=>'width=1px']) !!}
                </div>
            @else
                <div>
                    {!! Form::hidden('status', 'Proses', ['id'=>'status_input', 'style'=>'width=1px']) !!}
                </div>
            @endif
            <!-- id Field -->
            <div>
                {!! Form::hidden('id', null, ['id'=>'id_input', 'style'=>'width=1px']) !!}
            </div>
            <!-- Nama Field -->
            <div class="form-group col-sm-2">
                @if(isset($nama))
                    {!! Form::label('nama', 'Nama:') !!}
                    {!! Form::text('nama', $nama, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']) !!}
                @else
                    {!! Form::label('nama', 'Nama:') !!}
                    {!! Form::text('nama', null, ['class' => 'form-control form-control-sm', 'id'=>'nama_input']) !!}
                @endif
            </div>

            <!-- Mobil Field -->
            @if(isset($mobil))
                <div class="form-group col-sm-2">
                    {!! Form::label('mobil', 'Mobil:') !!}
                    {!! Form::text('mobil', $mobil, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']) !!}
                </div>
            @else
                <div class="form-group col-sm-2">
                    {!! Form::label('mobil', 'Mobil:') !!}
                    {!! Form::text('mobil', null, ['class' => 'form-control form-control-sm', 'id'=>'mobil_input']) !!}
                </div>
            @endif

            <!-- Nopol Field -->
            @if(isset($nopol))
                <div class="form-group col-sm-2">
                    {!! Form::label('nopol', 'No. Polisi:') !!}
                    {!! Form::text('nopol', $nopol, ['class' => 'form-control form-control-sm','id'=>'nopol_input']) !!}
                </div>
            @else
                <div class="form-group col-sm-2">
                    {!! Form::label('nopol', 'No. Polisi:') !!}
                    {!! Form::text('nopol', null, ['class' => 'form-control form-control-sm','id'=>'nopol_input']) !!}
                </div>
            @endif

            <!-- Tanggal Field -->
            <div class="form-group col-sm-2">
                {!! Form::label('tanggal', 'Tanggal:') !!}
                {!! Form::text('tanggal', null, ['class' => 'form-control form-control-sm','id'=>'tanggal_input']) !!}
            </div>

            <!-- Operator Field -->
            <div>
                {!! Form::hidden('user', Auth::user()->name, ['id'=>'operator_input','style'=>'width=1px']) !!}
            </div>

            <!-- Outlet Field -->
            <div class="form-group col-sm-2">
                @if(isset($serviceOrder->outlet))
                    <label for="outlet_input">Outlet:</label>
                    <select name="outlet" id="outlet_input" class="form-control form-control-sm" required>
                        <option selected hidden>{{$serviceOrder->outlet}}</option>
                        <option>JRM</option>
                        <option>BLPK</option>
                    </select>
                @else
                    <label for="outlet_input">Outlet:</label>
                    <select name="outlet" id="outlet_input" class="form-control form-control-sm" required>
                        <option value="" disabled selected hidden>Pilih outlet</option>
                        <option>JRM</option>
                        <option>BLPK</option>
                    </select>
                @endif

            </div>

            <div class="form-group col-sm-2">
                <label class="mb-0">Keterangan: </label>
                <div class="row">
                    <div class="form-check col-sm-12">
                        @if(isset($serviceOrder))
                            @if($serviceOrder->ppn == 1)
                                <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input" checked>
                            @else
                                <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input">
                            @endif
                        @else
                            <input name="ppn" type="checkbox" class="form-check-input" id="ppn_input">
                        @endif
                        <label class="form-check-label" for="ppn_input">PPN</label>
                    </div>

                    <div class="form-check col-sm-12">
                        @if(isset($serviceOrder))
                            @if($serviceOrder->tanpabongkar == 1)
                                <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input" checked>
                            @else
                                <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input">
                            @endif
                        @else
                            <input name="tanpabongkar" type="checkbox" class="form-check-input" id="tanpabongkar_input">
                        @endif
                        <label class="form-check-label" for="tanpabongkar_input">Tanpa bongkar</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_input').datetimepicker({
            format: 'DD-MM-YYYY',
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
