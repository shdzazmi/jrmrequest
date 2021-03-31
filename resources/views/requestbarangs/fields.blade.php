<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
    table tr:not(:first-child){
        cursor: pointer;transition: all .25s ease-in-out;
    }
    table tr:not(:first-child):hover{background-color: #ddd;}
</style>

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
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="input-group">
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'inputNama']) !!}
        {!! Form::button('<i class="fa fa-search"></i>', array('class' => 'btn btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'id' => '#btnModal', 'title' => 'Pencarian')) !!}
    </div>
    </div>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade " id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cari produk</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="content px-3">
                    <div class="table-responsive">
                        <table class="table" id="produk-table">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kendaraan</th>
                                <th>Part Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produks as $item)
                                <tr class='clickable-row' data-href='#' data-dismiss="modal">
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['kendaraan'] }}</td>
                                    <td>{{ $item['part_number'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

{{--Modal Script--}}
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

@push('page_scripts')
    <script type="text/javascript">
        $("#btnModal").click(function(){
        });
    </script>
@endpush

<!-- Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    {!! Form::text('kendaraan', null, ['class' => 'form-control', 'id' => 'inputKendaraan']) !!}
</div>

<!-- Part Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('part_number', 'Part Number:') !!}
    {!! Form::text('part_number', null, ['class' => 'form-control', 'id' => 'inputPartNumber']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var events = $('#events');
            var table = $('#produk-table').DataTable( {
                select: true
            } );

            table.on('select', function (e, dt, type, indexes){
                var rowData = table.rows(indexes).data().toArray();
                events.prepend(JSON.stringify(rowData));
            })
        } );

        var table = document.getElementById('produk-table');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                rIndex = this.rowIndex;
                console.log(rIndex);
                document.getElementById("inputNama").value = this.cells[0].innerHTML;
                document.getElementById("inputKendaraan").value = this.cells[1].innerHTML;
                document.getElementById("inputPartNumber").value = this.cells[2].innerHTML;
            };
        }
    </script>
@endpush
