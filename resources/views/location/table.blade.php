
    <table class="table table-head-fixed" id="tbSearchLocation">
        <thead>
        <tr>
            <th>Produk</th>
            <th>Barcode</th>
            <th>Kendaraan</th>
            <th>Lokasi 1</th>
            <th>Lokasi 2</th>
            <th>Lokasi 3</th>
        </tr>
        </thead>
        <tbody id="table-body">
        @foreach($items as $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['barcode'] }}</td>
                <td>{{ $item['kendaraan'] }}</td>
                <td>{{ $item['lokasi1'] }}</td>
                <td>{{ $item['lokasi2'] }}</td>
                <td>{{ $item['lokasi3'] }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    @push('page_scripts')
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <script>

            $(document).each( function () {
                $(function(){
                    var hide = true;
                    $('#tbSearchLocation td').each(function(){
                        var td_content = $(this).text();
                        if(td_content!==""){
                            hide = false;
                        }
                    })
                    if(hide){
                        $('#tbSearchLocation').hide();
                    }
                })
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

    @endpush
