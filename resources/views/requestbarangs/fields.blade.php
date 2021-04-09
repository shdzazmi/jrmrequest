{{--Datatables--}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css"/>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control','id'=>'tanggal']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal').datetimepicker({
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

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    <div class="input-group">
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'inputNama']) !!}
        {!! Form::button('<i class="fa fa-search"></i>', array('class' => 'btn btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'id' => '#btnModal', 'title' => 'Pencarian')) !!}
    </div>
</div>

<!--Table hover and cursor style-->
<style>
    #requestbarangproduk tbody tr:hover{
        cursor: pointer;
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }
</style>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Cari produk</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="content px-3">
                    <!-- Table Produk -->
                    <div class="table-responsive">
                        <table class="table table-striped dataTable" id="requestbarangproduk">
                            <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Barcode</th>
                                <th>Kode Supplier</th>
                                <th>Kendaraan</th>
                                <th>Part Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produks as $item)
                                <tr class='clickable-row' data-dismiss="modal">
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['barcode'] }}</td>
                                    <td>{{ $item['kd_supplier'] }}</td>
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

<!-- Barcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barcode', 'Barcode:') !!}
    {!! Form::text('barcode', null, ['class' => 'form-control', 'id' => 'inputBarcode']) !!}
</div>

<!-- Kode supplier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kd_supplier', 'Kode supplier:') !!}
    {!! Form::text('kd_supplier', null, ['class' => 'form-control', 'id' => 'inputKd_supplier']) !!}
</div>

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
            $('#requestbarangproduk').DataTable( {
                select: true
            } );
        } );

        var table = document.getElementById('requestbarangproduk');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("inputNama").value = this.cells[0].innerHTML;
                document.getElementById("inputBarcode").value = this.cells[1].innerHTML;
                document.getElementById("inputKd_supplier").value = this.cells[2].innerHTML;
                document.getElementById("inputKendaraan").value = this.cells[3].innerHTML;
                document.getElementById("inputPartNumber").value = this.cells[4].innerHTML;
            };
        }
    </script>
@endpush

