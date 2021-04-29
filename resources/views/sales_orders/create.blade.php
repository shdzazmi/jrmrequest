@extends('layouts.app')
@section('title', 'Buat sales order')

@section('content')

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                    <h5>Create Sales Order</h5>
                </div>
            </div>
        </section>
    </div>

    <div class = "col-sm-12">
        @include('adminlte-templates::common.errors')
    </div>

    <div class = "row">
        <div class = "col-sm-3">
            <div class="content px-3">
                @include('sales_orders.fields')
                <button class="btn btn-primary btn-block" onclick="uploadSalesOrder()">Check out</button>
                <a href="{{ route('salesOrders.index') }}" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
        <div class = "col-sm-9">
            <div class="content pr-3">
                @include('sales_orders.list_order')
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="col-sm-12">
            <div class="content px-3" style="height: 300px">
                @include('sales_orders.table_produk')
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')

    <script>
        var tbOrder = document.getElementById("table-body");
        function getTotalPrice() {
            var total = 0;
            var table = document.getElementById("table-body");
            var totaltext = document.getElementById("total-text");
            for(var i = 0; i < table.rows.length; i++)
            {
                total = total + parseFloat(table.rows[i].cells[6].innerHTML);
            }
            totaltext.innerHTML = numberFormat(total);
        }

        function updateSubtotal(id) {
            var qty =  Number($(id).closest("tr").find("input[id*='qtyInput']").val());
            var price = Number($(id).closest("tr").find("input[id*='hargaInput']").val());
            $(id).closest("tr").find('td:eq(6)').text(qty*price);
            getTotalPrice();
            return false;
        }

        function updateInputHarga(id) {
            Number($(id).closest("tr").find("input[id*='hargaInput']").val($(id).attr('data-value')));
            updateSubtotal(id);
        }

        function uploadSalesOrder() {
            var td_content = $('#table-body td').text();
            var table = document.getElementById( "table-body" );
            var nama = document.getElementById( "nama_input" ).value;
            var tanggal = document.getElementById( "tanggal_input" ).value;
            var url = '{{ route("salesOrder.storeData") }}';
            var urlOrder = '{{ route("salesOrders.store") }}';
            if(td_content !== "" && nama !== "" && tanggal !== ""){

                // listorder
                for ( var i = 0; i < table.rows.length; i++ ) {
                    var harga = table.rows[i].cells[4].children[0].children[0].value;
                    var qty = table.rows[i].cells[5].children[0].value;
                    var subtotal = harga*qty;
                    var data = {
                        uid : document.getElementById( "uid_input" ).value,
                        produk: table.rows[i].cells[1].innerHTML,
                        barcode: table.rows[i].cells[2].innerHTML,
                        kendaraan: table.rows[i].cells[3].innerHTML,
                        harga: harga,
                        qty: qty,
                        subtotal: subtotal.toString()
                    };
                    // console.log(data)
                    $.ajax({
                        url: url,
                        method:"POST",
                        data: data,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                    });
                }

                var dataorder = {
                    uid : document.getElementById( "uid_input" ).value,
                    nama,
                    tanggal,
                    status : document.getElementById( "status_input" ).value
                };

                // salesorder
                $.ajax({
                    url: urlOrder,
                    method:"POST",
                    data: dataorder,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data){
                        toastSuccess("Sukses!", "Data berhasil ditambah");
                         var url = '{{ route("salesOrders.show", [":id"])}}';
                         url = url.replace(':id', data.id);
                         window.location.href = url;
                    },
                    error: function (data){
                        toastError("Gagal!", "Terjadi kesalahan internal.");
                        window.location.href = '{{ route("salesOrders.index") }}';
                    }
                });

            } else {
                toastError("Gagal!", "Lengkapi data.")
            }
        }

    </script>
@endpush
