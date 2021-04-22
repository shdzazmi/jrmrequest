
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Daftar order</h3>
    </div>
    <div class="card-body table-responsive p-0" style="height: 250px;">
        <table class="table table-head-fixed" id="orderlist">
            <thead>
            <tr>
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
        getTotalPrice()
    }
</script>
