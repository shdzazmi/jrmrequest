@extends('layouts.app')

@section('content')

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                </div>
            </div>
        </section>
    </div>

    <div class = "row">
        <div class = "col-sm-5 pl-5 pb-5">
            <div class="content">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="fas fa-box"></i> Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fas fa-wrench"></i> Jasa Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pl-3 pb-3" style="font-size: 14px">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                @include('service_orders.table_produk')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                @include('service_orders.table_service')
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class = "col-sm-7 pr-5 pb-5">
            <div class="content" style="font-size: 12px">
                @include('service_orders.fields')
                @include('service_orders.list_order')
                <button class="btn btn-primary btn-block" onclick="uploadServiceOrder()">Check out</button>
                <a href="{{ route('serviceOrders.index') }}" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
    </div>

@endsection
@push('page_scripts')

    <script>
        tampilLoading('Memuat...');

        var tbOrder = document.getElementById("table-body");
        function getTotalPrice() {
            var total = 0;
            var table = document.getElementById("table-body");
            var totaltext = document.getElementById("total-text");
            for(var i = 0; i < table.rows.length; i++)
            {
                total = total + parseFloat(table.rows[i].cells[7].innerHTML);
            }
            totaltext.innerHTML = numberFormat(total);
        }

        function updateSubtotal(id) {
            var qty =  Number($(id).closest("tr").find("input[id*='qtyInput']").val());
            var price = Number($(id).closest("tr").find("input[id*='hargaInput']").val());
            var disc = Number($(id).closest("tr").find("input[id*='discInput']").val()) / 100;
            var jumlah = qty*price;
            var discprice = jumlah*disc;
            var afterdisc = jumlah-discprice;
            $(id).closest("tr").find('td:eq(7)').text(afterdisc);

            getTotalPrice();
            return false;
        }

        function updateInputHarga(id) {
            Number($(id).closest("tr").find("input[id*='hargaInput']").val($(id).attr('data-value')));
            updateSubtotal(id);
        }



        function uploadServiceOrder() {

            let nama = document.getElementById("nama_input").value;
            let tanggal = document.getElementById("tanggal_input").value;
            let mobil = document.getElementById("mobil_input").value;
            let nopol = document.getElementById("nopol_input").value;
            let td_content = $('#table-body td').text();
            let table = document.getElementById( "table-body" );
            let url = '{{ route("serviceOrders.updateData") }}';
            let urlOrder = '{{ route("serviceOrders.store") }}';

            if (td_content !== "" && nama !== "" && tanggal !== "" && mobil !== "" && nopol !== ""){
                // tampilLoading('Menambahkan data...');
                // listorder
                for ( let i = 0; i < table.rows.length; i++ ) {
                    let harga = table.rows[i].cells[4].children[0].value;
                    let qty = table.rows[i].cells[5].children[0].value;
                    let disc = table.rows[i].cells[6].children[0].value;
                    let subtotal = table.rows[i].cells[7].innerHTML;
                    let id = table.rows[i].cells[0].innerHTML;
                    let uid = document.getElementById( "uid_input" ).value;
                    let barcode = table.rows[i].cells[1].innerHTML;
                    let ketnama = table.rows[i].cells[3].children[0].value;
                    let type = table.rows[i].cells[2].innerHTML;
                    let ket = table.rows[i].cells[8].children[0].value;

                    let data = {
                        id: id,
                        uid : uid,
                        barcode: barcode,
                        ketnama: ketnama,
                        harga: harga,
                        qty: qty,
                        discount: disc,
                        type: type,
                        keterangan: ket,
                        subtotal: subtotal
                    };
                    // console.log(data);
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
                    operator : document.getElementById( "operator_input" ).value,
                    mobil,
                    nopol,
                };

                // Serviceorder
                $.ajax({
                    url: urlOrder,
                    method:"POST",
                    data: dataorder,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data){
                        var url = '{{ route("serviceOrders.show", [":id"])}}';
                        url = url.replace(':id', data.id);
                        window.onbeforeunload = null;
                        window.location.href = url;
                    },
                    error: function (data){
                        toastError("Gagal!", "Terjadi kesalahan internal.");
                        window.onbeforeunload = null;
                        window.location.href = '{{ route("serviceOrders.index") }}';
                    }
                });

            } else {
                toastError("Gagal!", "Lengkapi data.")
            }
        }

        window.onbeforeunload = confirmExit;

        function confirmExit()
        {
            deleteAllRowService();
            return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
        }

    </script>
@endpush
