
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Daftar order</h3>
    </div>
    <div class="card-body table-responsive p-0" style="height: 250px;">
        <table class="table table-head-fixed" id="orderlist">
            <thead>
            <tr>
                <th style="display:none;">Produk</th>
                <th>Produk</th>
                <th>Barcode</th>
                <th>Kendaraan</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>
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
                        <td>{{ $listorders->nama }}</td>
                        <td>{{ $listorders->barcode }}</td>
                        <td>{{ $listorders->kendaraan }}</td>
                        <td>
                            <div class="input-group-append">
                                <input type="number" class="form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="{{$listorders->harga}}">
                                    <div  class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga}}"><span class="badge badge-pill bg-secondary" >1</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga2}}"><span class="badge badge-pill bg-secondary">2</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga2}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->harga3}}"><span class="badge badge-pill bg-secondary">3</span>{{$produks->firstWhere('barcode', $listorders->barcode)->harga3}}</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="{{$produks->firstWhere('barcode', $listorders->barcode)->hargamin}}"><span class="badge badge-pill bg-secondary">4</span>{{$produks->firstWhere('barcode', $listorders->barcode)->hargamin}}</a>
                                    </div >
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            </div>
                        </td>
                        <td><input type="number" value="{{ $listorders->qty }}" min="1" id="qtyInput" style="width: 60px" onchange="updateSubtotal(this);"/></td>
                        <td class="text">{{ $listorders->subtotal }}</td>
                        <td><button class="btn btn-tool" type="button" onclick="deleteRow(this, {{$listorders->id}})"><i class="fas fa-trash"></i></button></td>
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

    function deleteRow(r, ids) {
        var i = r.parentNode.parentNode.rowIndex;
        if (typeof ids !== 'undefined') {
            $.ajax({
                url: '{{ route("listOrder.delete") }}',
                method:"POST",
                cache: false,
                data: {id: id},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (data){
                    if (data === "success") {
                        document.getElementById("table-body").deleteRow(i-1);
                        getTotalPrice();
                    } else {
                        toastError("Error!", "Terjadi kesalahan internal.")
                        {{--window.location.href = '{{ route("salesOrders.index") }}';--}}
                    }
                }
            });
        } else {
            document.getElementById("table-body").deleteRow(i-1);//
        }
    }

    function deleteAllRow() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('table-body');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        getTotalPrice()
    }
</script>
