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
                {!! Form::text('tanggal', $datetimes, ['class' => 'form-control','id'=>'tanggal','disabled']) !!}
            </div>
        </div>
    </div>
</div>

    <!-- Table produk -->
<div class="card">

    <div class="card-body">
        <div class="table-responsive">
            <table class="dataTable table-striped" id="salesorderproduk">
                <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kode Supplier</th>
                    <th>Kendaraan</th>
                    <th>Part Number</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produks as $item)
                    <tr class='clickable-row'>
                        <td>{{ $item['nama'] }}<br/><span class="badge bg-secondary">{{ $item->barcode }}</span></td>
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
            var events = $('#events');
            var table2 = $('#salesorderproduk').DataTable( {
                select: true,
                processing: true,
                initComplete: function(){
                    $("#salesorderproduk").show();
                }
            } );

            table2.on('select', function (e, dt, type, indexes){
                var rowData = table2.rows(indexes).data().toArray();
                events.prepend(JSON.stringify(rowData));
            })
        } );

        var table = document.getElementById('salesorderproduk');

        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                var table = document.getElementById("orderlist");
                var row = table.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = this.cells[0].innerHTML;
                cell2.innerHTML = this.cells[1].innerHTML;
                var pHarga = 10000;
                var qtyInput = '<input type="number" value="1" min="1" oninput="validity.valid||(value=1);" id="pJumlah" style="width:50px">';
                cell3.innerHTML = pHarga;
                cell4.innerHTML = qtyInput;
                var pQty = document.getElementById("pJumlah").value;
                cell5.innerHTML = '<p id="subTotal"></p';

                $('#pJumlah').change(function(e) {
                    document.getElementById("pJumlah").innerHTML = document.getElementById("pJumlah").value;
                    document.getElementById("subTotal").innerText = pHarga * document.getElementById("pJumlah").value;
                });

                $('#pJumlah').keydown(function(e) {
                    document.getElementById("pJumlah").innerHTML = document.getElementById("pJumlah").value;
                    document.getElementById("subTotal").innerText = pHarga * document.getElementById("pJumlah").value;
                });

                // rIndex = this.rowIndex;
                // document.getElementById("inputNama").value = this.cells[0].innerHTML;
                // document.getElementById("inputKendaraan").value = this.cells[1].innerHTML;
                // document.getElementById("inputPartNumber").value = this.cells[2].innerHTML;
            };
        }

    </script>
@endpush
