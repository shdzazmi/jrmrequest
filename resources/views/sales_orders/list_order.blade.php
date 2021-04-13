
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Daftar order</h3>
    </div>
    <div class="card-body table-responsive p-0" style="height: 500px;">
        <table class="table table-head-fixed" id="orderlist">
            <thead>
            <tr>
                <th style="width: 125px">Produk</th>
                <th style="width: 70px">Barcode</th>
                <th style="width: 125px">Kendaraan</th>
                <th style="width: 70px">Harga</th>
                <th style="width: 60px">Qty</th>
                <th style="width: 60px">Subtotal</th>
                <th style="width: 60px">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus semua">
                        <span style="color: darkred" onclick="deleteAllRow()" >
                            <i class="fas fa-ban"></i>
                        </span>
                    </a>
                </th>
            </tr>
            </thead>

            <tbody id="table-body">

            <?php $total = 0 ?>
            @foreach($list_order as $item)
                <?php $subtotal = $item['harga'] * $item['qty'] ?>
                <?php $total += $item['harga'] * $item['qty'] ?>
                <tr>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['barcode'] }}</td>
                    <td>{{ $item['kendaraan'] }}</td>
                    <td id="hargaInput">{{ $item['harga'] }}</td>
                    <td><input type="number" value="{{ $item['qty'] }}" class="form-control form-control-sm quantity" min="1" id="qtyInput" oninput="addSubtotal()"  style="width: 60px"/></td>
                    <td id="subtotal">{{ $subtotal }}</td>
                    <td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-3">
                <h4>Total</h4>
            </div>
            <div class="col-sm-9 text-right">
                <h4 id="total-text">100000</h4>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var x = 0;
        var sum = 0;

        function addSubtotal() {
            var x = document.getElementById("qtyInput").value;
            var y = document.getElementById("hargaInput").innerHTML;
            document.getElementById("subtotal").innerHTML = x * y;
        }

    });

    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("table-body").deleteRow(i-1);
        getTotalPrice();
    }

    function deleteAllRow() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('table-body');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }
</script>
