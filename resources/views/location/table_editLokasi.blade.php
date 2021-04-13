
    <table class="table table-head-fixed" id="tbEditLocation">
        <thead>
        <tr>
            <th>Produk</th>
            <th>Barcode</th>
            <th>Kendaraan</th>
            <th>Lokasi 1</th>
            <th>Lokasi 2</th>
            <th>Lokasi 3</th>
            <th style="width: 60px">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Hapus semua">
                        <span style="color: darkred" onclick="deleteAllRow()" >
                            <i class="fas fa-ban"></i>
                        </span>
                </a>
            </th></tr>
        </thead>
        <tbody id="tbEditData">
        </tbody>
    </table>

    @push('page_scripts')
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <script>

             $(document).each( function () {
                 $(function(){
                     var hide = true;
                     $('#tbEditLocation td').each(function(){
                         var td_content = $(this).text();
                         if(td_content!==""){
                             hide = false;
                         }
                     })
                     if(hide){
                         $('#tbEditLocation').hide();
                     }
                 })
             });

            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("tbEditData").deleteRow(i-1);

                $(function(){
                    var hide = true;
                    $('#tbEditLocation td').each(function(){
                        var td_content = $(this).text();
                        if(td_content!==""){
                            hide = false;
                        }
                    })
                    if(hide){
                        $('#tbEditLocation').hide();
                    } else {
                        $('#tbEditLocation').show();
                    }
                })
            }

            function deleteAllRow() {
                var tableHeaderRowCount = 0;
                var table = document.getElementById('tbEditData');
                var rowCount = table.rows.length;
                for (var i = tableHeaderRowCount; i < rowCount; i++) {
                    table.deleteRow(tableHeaderRowCount);
                }
                $('#tbEditLocation').hide();
            }
        </script>

    @endpush


