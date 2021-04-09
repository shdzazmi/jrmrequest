<!--Table hover and cursor style-->
<style>
    #salesorderproduk tbody tr:hover{
        cursor: pointer;
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }
    #salesorderproduk{
        display:none;
    }
</style>

{{--Form pertama--}}
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data customer</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Nama Field -->
            <div class="form-group col-sm">
                {!! Form::label('nama', 'Nama:') !!}
                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
            </div>
            <!-- No Telepon Field -->
            <div class="form-group col-sm">
                {!! Form::label('no_telepon', 'No Telepon:') !!}
                {!! Form::number('no_telepon', null, ['class' => 'form-control','oninput'=>'validity.valid||(value="");', 'min'=>'0']) !!}
            </div>
            <!-- Tanggal Field -->
            <div class="form-group col-sm-5">
                {!! Form::label('tanggal', 'Tanggal:') !!}
                {!! Form::text('tanggal', $datetimes, ['class' => 'form-control','id'=>'tanggal']) !!}
            </div>
            <!-- uuid Field -->
            <div>
                {!! Form::hidden('uid', $uuid, ['id'=>'uuid_input', 'style'=>'width=1px']) !!}
            </div>
            <!-- status Field -->
            <div>
                {!! Form::hidden('status', 'Proses', ['id'=>'uuid_input', 'style'=>'width=1px']) !!}
            </div>
        </div>
    </div>
</div>

    <!-- Table produk -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pilih produk</h3>
    </div>
    <div class="card-body table-responsive">
        <div class="table-responsive">
            <table class="table dataTable table-striped" id="salesorderproduk">
                <thead>
                    <tr>
                        <th style="width: 125px">Produk</th>
                        <th style="width: 70px">Barcode</th>
                        <th style="width: 70px">Kode Supplier</th>
                        <th style="width: 125px">Kendaraan</th>
                        <th>Part Number</th>
                        <th>Harga</th>
                    </tr>
                </thead>
            <tbody>
            @foreach($produks as $item)
                <tr class='clickable-row'>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['barcode'] }}</td>
                    <td>{{ $item['kd_supplier'] }}</td>
                    <td>{{ $item['kendaraan'] }}</td>
                    <td>{{ $item['part_number'] }}</td>
                    <td>{{ $item['harga'] }}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
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

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>

        $(document).ready(function() {
            var table2 = $('#salesorderproduk').DataTable( {
                select: true,
                processing: true,
                autoWidth: false,
                initComplete: function(){
                    $("#salesorderproduk").show();
                },
                columnDefs: [
            {
                "targets": [ 4 ],
                "visible": false
            }
        ]
            });
            table2.on('click', 'tr', function (e, dt, type, indexes){
                var rowData = table2.row( this ).data();
                var table = document.getElementById("table-body");
                var row = table.insertRow();

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);

                cell1.innerHTML = rowData[0];
                cell2.innerHTML = rowData[1];
                cell3.innerHTML = rowData[3];
                cell4.innerHTML = parseFloat(rowData[5]);
                var qty = 1;
                cell5.innerHTML = '<input type="number" value="'+qty+'" class="form-control form-control-sm quantity" min="1" id="qtyInput" oninput="addSubtotal()" style="width: 60px"/>';
                cell6.innerHTML = rowData[5]*qty;
                cell7.innerHTML = '<button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button>';

                getTotalPrice();

            });

        } );
    </script>


@endpush
