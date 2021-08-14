
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Daftar order</h3>
        <div class="card-tools">
            Tipe Harga:
            <select style="width: 80px" id="tipeharga" class="form-control form-control-sm">
                @if(isset($tipeharga))
                <option value="{{$tipeharga}}" selected hidden>{{$tipeharga}}</option>
                @endif
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>
    <div class="card-body table-responsive p-0" style="font-size:12px; height: 250px;">
        <table class="table table-sm" id="orderlist" style="font-size:12px;">
            <thead>
            <tr>
                <th style="display:none; width: 20%;">ID</th>
                <th style="text-align: center; width: 30%;">Produk</th>
                <th style="text-align: center; width: 10%;">Barcode</th>
                <th style="text-align: center; width: 10%;">Kendaraan</th>
                <th style="text-align: center; width: 20%;">Harga</th>
                <th style="text-align: center; width: 5%;">Qty</th>
                <th style="text-align: center; width: 10%;">Subtotal</th>
                <th style="text-align: center; width: 20%;">Keterangan</th>
                <th style="text-align: center; width: 5%;">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus semua">
                        <span style="color: darkred" onclick="deleteAllRow()" >
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
                        <td style="vertical-align: middle;">{{ $listorders->nama }}</td>
                        <td style="vertical-align: middle;">{{ $listorders->barcode }}</td>
                        <td style="vertical-align: middle;">{{ $listorders->kendaraan }}</td>
                        <td style="vertical-align: middle;">
                            <div class="input-group-append">
                                <input type="number" class="form-control form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="{{$listorders->harga}}">
                                    <div  class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga}}"><span class="badge badge-pill bg-secondary" >1</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga2}}"><span class="badge badge-pill bg-secondary">2</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga2}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga3}}"><span class="badge badge-pill bg-secondary">3</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga3}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->hargamin}}"><span class="badge badge-pill bg-secondary">min</span>{{$produks->firstWhere('barcode', $listorders->barcode)->hargamin}}</a>
                                    </div >
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            </div>
                        </td>
                        <td style="vertical-align: middle;"><input class="form-control form-control-sm" style="width: 50px" type="number" value="{{ $listorders->qty }}" min="1" id="qtyInput" onchange="updateSubtotal(this);"/></td>
                        <td class="text" style="vertical-align: middle;">{{ $listorders->subtotal }}</td>
                        <td style="vertical-align: middle;"><input class="form-control form-control-sm" type="text" value="{{ $listorders->keterangan }}" id="ketInput"/></td>
                        <td style="vertical-align: middle;"><button class="btn btn-tool" type="button" data-value="{{$listorders->id}}" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-3">
                <h4>Total</h4>
            </div>
            <div class="col-sm-9 text-right">
                <h4 id="total-text">0</h4>
            </div>
        </div>
    </div>
</div>

<script>

    function deleteRow(r) {
        var ids = $(r).attr('data-value');
        var i = r.parentNode.parentNode.rowIndex;
        if (typeof ids !== 'undefined') {
            $.ajax({
                url: '{{ route("listOrder.delete") }}',
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

    function deleteAllRow() {
        var uid = document.getElementById( "uid_input" ).value;
        var tableHeaderRowCount = 0;
        var table = document.getElementById('table-body');
        var rowCount = table.rows.length;
        var url = '{{ route("listOrder.deleteAll", [":uid"]) }}';
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
