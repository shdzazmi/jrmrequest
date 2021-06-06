
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar order</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-sm" id="orderlist">
            <thead>
                <tr>
                    <th style="display:none;">ID</th>
                    <th style="display:none;">Barcode</th>
                    <th style="text-align: center; width: 35%">Produk</th>
                    <th style="text-align: center; width: 15%">Harga</th>
                    <th style="text-align: center; width: 10%">Qty</th>
                    <th style="text-align: center; width: 15%">Disc %</th>
                    <th style="text-align: center; width: 25%">Jumlah</th>
                    <th style="text-align: center; width: 25%">Ket</th>
                    <th style="text-align: center">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus semua">
                            <span style="color: darkred" onclick="deleteAllRowService()" >
                                <i class="fas fa-ban"></i>
                            </span>
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody id="table-body">
                @if(isset($listorder))
                    @foreach($listorder as $listorders)
                    <tr>
                        <td style="display:none;">{{ $listorders->id }}</td>
                        <td style="display:none;">{{ $listorders->barcode }}</td>
                        <td style="display:none;">{{ $listorders->type }}</td>
                        <td><input type="text" class="form-control form-control-sm" id="namaInput" value="{{ $listorders->ketnama}}"></td>
                        <td><input type="number" class="form-control form-control-sm inputharga" id="hargaInput" style="text-align: right" onchange="updateSubtotal(this)" value="{{$listorders->harga}}"></td>
                        <td><input type="number" class="form-control form-control-sm" value="{{ $listorders->qty }}" min="1" id="qtyInput" style="width: 50px; text-align: right" onchange="updateSubtotal(this);"/></td>
                        <td><input type="number" class="form-control form-control-sm" value="{{ $listorders->discount }}" min="1" id="discInput" style="width: 60px; text-align: right" onchange="updateSubtotal(this);"/></td>
                        <td class="text" style="text-align: right">{{ $listorders->subtotal }}</td>
                        <td><input type="text" class="form-control form-control-sm" value="{{ $listorders->keterangan }}" style="width: 60px" id="ketInput"/></td>
                        <td><button class="btn btn-tool" type="button" data-value="{{$listorders->id}}" onclick="deleteRowService(this)"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-3">
                <h5>Total</h5>
            </div>
            <div class="col-sm-9 text-right">
                <h5 id="total-text">0</h5>
            </div>
        </div>
    </div>
</div>

<script>

    function deleteRowService(r) {
        var ids = $(r).attr('data-value');
        var i = r.parentNode.parentNode.rowIndex;
        if (typeof ids !== 'undefined') {
            $.ajax({
                url: '{{ route("listServiceOrder.delete") }}',
                method:"POST",
                cache: false,
                data: {id: ids},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (data){
                    if (data === "success") {
                        document.getElementById("table-body").deleteRow(i-1);
                        getTotalPrice();
                    } else {
                        toastError("Error!", "Terjadi kesalahan internal.")
                    }
                }
            });
        } else {
            document.getElementById("table-body").deleteRow(i-1);
            getTotalPrice();
        }
    }

    function deleteAllRowService() {
        var uid = document.getElementById( "uid_input" ).value;
        var tableHeaderRowCount = 0;
        var table = document.getElementById('table-body');
        var rowCount = table.rows.length;
        var url = '{{ route("listServiceOrder.deleteAll", [":uid"]) }}';
        url = url.replace(':uid', uid);

        $.ajax({
            url: url,
            method:"POST",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (data){
                if (data === "success") {
                    for (var i = tableHeaderRowCount; i < rowCount; i++) {
                        table.deleteRow(tableHeaderRowCount);
                    }
                    getTotalPrice();
                } else {
                    toastError("Error!", "Terjadi kesalahan internal.")
                }
            }
        });
    }
</script>
