<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".show-modal").click(function(){
            $("#myModal").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    });
</script>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Nama Field -->
<div class="form-group col-sm-6" data-toggle="modal" data-target="#myModal" id="btnModal">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cari produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@push('page_scripts')
    <script type="text/javascript">
        $("#btnModal").click(function(){
        $("#myModal").modal({backdrop: "static"});
        });
    </script>
@endpush
<!-- Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    {!! Form::text('kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Part Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('part_number', 'Part Number:') !!}
    {!! Form::text('part_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>