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

<!-- Table produk -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pilih produk</h3>
    </div>
    <div class="card-body table-responsive">
        <div class="table-responsive">
            <table class="table dataTable table-striped"  id="salesorderproduk">
                <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Produk</th>
                    <th>Kode Supplier</th>
                    <th>Kendaraan</th>
                    <th>Part Number</th>
                    <th>Harga</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody id="tbsalesorder">
                @foreach($produks as $item)
                    <tr class='clickable-row'>
                        <td>
                            {{ $item['barcode'] }}
                        </td>
                        <td>
                            {{ $item['nama'] }}<br/>
                            <span class="badge bg-secondary">{{ $item['barcode'] }}</span>
                        </td>
                        <td>{{ $item['kd_supplier'] }}</td>
                        <td>{{ $item['kendaraan'] }}</td>
                        <td>
                            <span class="badge badge-pill bg-secondary">1</span> {{ $item['partno1'] }}<br/>
                            <span class="badge badge-pill bg-secondary">2</span> {{ $item['partno2'] }}
                        </td>
                        <td>
                            <span class="badge badge-pill bg-secondary">1</span> {{ $item['harga'] }}<br/>
                            <span class="badge badge-pill bg-secondary">2</span> {{ $item['harga2'] }}<br/>
                            <span class="badge badge-pill bg-secondary">3</span> {{ $item['harga3'] }}<br/>
                            <span class="badge badge-pill bg-secondary">min</span> {{ $item['hargamin'] }}<br/>
                        </td>
                        <td>{{ $item['qty'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('page_scripts')

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function() {
        const tbProduk = $('#salesorderproduk').DataTable({
            select: true,
            processing: true,
            autoWidth: false,
            initComplete: function () {
                $("#salesorderproduk").show();
            },
            columnDefs: [
                {
                    targets: [ 0 ],
                    visible: false,
                }
            ]
        });



        var lastResult;
        tbProduk.on('click', 'tr', function (e, dt, type, indexes) {
            var rowData = tbProduk.row(this).data();
            if (rowData !== lastResult) {
                lastResult = rowData;
                var bcode = rowData[0];
                var url = '{{ route("salesOrder.put", ":bcode") }}';
                url = url.replace(':bcode', bcode);
                $.ajax({
                    url: url,
                    method: "POST",
                    data: bcode,
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data) {

                        $('#table-body').append(
                            '<tr>' +
                            '<td>' + data.nama + '</td>  ' +
                            '<td>' + data.barcode + '</td> ' +
                            '<td>' + data.kendaraan + '</td> ' +
                            '<td >' +
                                '<div class="input-group-append">'+
                                '<input type="number" class="form-control-sm inputharga dropdown-toggle" id="hargaInput" onchange="updateSubtotal(this)" value="'+ data.harga +'">'+
                                '<div  class="dropdown-menu">'+
                                '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga +'"><span class="badge badge-pill bg-secondary" >1</span> '+ data.harga +'</a>'+
                                '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga2 +'"><span class="badge badge-pill bg-secondary">2</span> '+ data.harga2 +'</a>'+
                                '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.harga3 +'"><span class="badge badge-pill bg-secondary">3</span> '+ data.harga3 +'</a>'+
                                '<a class="dropdown-item" href="javascript:void(0)" onclick="updateInputHarga(this)" data-value="'+ data.hargamin +'"><span class="badge badge-pill bg-secondary">4</span> '+ data.hargamin +'</a>'+
                                '</div >'+
                                '<button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>'+
                                '</div>' +
                            '</td> ' +
                            '<td ><input type="number" value="1" min="1" id="qtyInput" style="width: 60px" onchange="updateSubtotal(this);"/></td> ' +
                            '<td class="text">' + data.harga + '</td> ' +
                            '<td><button class="btn btn-tool" type="button" onclick="deleteRow(this)"><i class="fas fa-trash"></i></button></td>' +
                            '</tr>');
                        getTotalPrice();
                    },
                    error: function (data) {
                        toastError("Gagal!", "Terjadi kesalahan internal.")
                    }
                })
            }
        });



    });



</script>
@endpush
