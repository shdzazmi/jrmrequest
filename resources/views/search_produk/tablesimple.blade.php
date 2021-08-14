<style>
    #salesorderproduk_simples{
        display:none;
    }
</style>

<!-- Table produk simple-->
    <div style="font-size:12px;" class="card-body table-responsive p-0 pb-2">
        <table style="font-size:12px; table-layout: fixed;" class="table dataTable display"  id="salesorderproduk_simples">
            <thead>
            <tr style="text-align:center">
                <th style="width: 85%">Produk</th>
                <th style="width: 15%">Qty</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody id="tbsalesorder_simple" class="p-0 m-0">
{{--            @foreach($produks as $item)--}}
{{--                <tr class='clickable-row'>--}}
{{--                    <td style="width: 10%">--}}
{{--                        {{ $item['ketnama'] }} @if($item['kendaraan'] != "") • {{$item['kendaraan']}} @endif--}}
{{--                        <br/>--}}
{{--                        <span class="badge bg-secondary">{{ $item['barcode'] }}</span>--}}
{{--                        <span class="badge bg-secondary">{{ $item['kd_supplier'] }}</span>--}}
{{--                        <span class="badge bg-primary">{{ $item['merek'] }}</span>--}}
{{--                        @if($item['partno1'] != "")--}}
{{--                            <br>--}}
{{--                            Part number:--}}
{{--                            <span class="badge badge-dark">{{ $item['partno1'] }}</span>--}}
{{--                            @if($item['partno2'] != "")--}}
{{--                                <span class="badge badge-dark">{{ $item['partno2'] }}</span>&nbsp&nbsp--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            @if($item['partno2'] != "")--}}
{{--                                <span class="badge badge-dark">{{ $item['partno2'] }}</span>&nbsp&nbsp--}}
{{--                            @endif--}}
{{--                        @endif--}}

{{--                        @if($item->lokasi1 != "")--}}
{{--                            <br>Lokasi:&nbsp<span class="badge badge-dark">{{ $item->lokasi1 }}</span>--}}
{{--                        @endif--}}
{{--                        @if($item->lokasi2 != "")--}}
{{--                            <span class="badge badge-dark">{{ $item->lokasi2 }}</span>&nbsp&nbsp--}}
{{--                        @endif--}}
{{--                        @if($item->lokasi3 != "")--}}
{{--                            <span class="badge badge-dark">{{ $item->lokasi3 }}</span>&nbsp&nbsp--}}
{{--                        @endif--}}
{{--                        <br>--}}
{{--                        Harga:--}}
{{--                        1 <span class="badge badge-dark">{{ number_format($item['harga']) }}</span>&nbsp&nbsp--}}
{{--                        2 <span class="badge badge-dark">{{ number_format($item['harga2']) }}</span>&nbsp&nbsp--}}
{{--                        3 <span class="badge badge-dark">{{ number_format($item['harga3']) }}</span>&nbsp&nbsp--}}
{{--                        Min <span class="badge badge-dark">{{ number_format($item['hargamin']) }}</span>&nbsp&nbsp--}}
{{--                        <br>--}}
{{--                        Stok: <span class="badge badge-primary">{{ $item['qty'] }}</span>--}}
{{--                        <br>--}}
{{--                        Stok Toko: <span class="badge badge-dark">{{ $item['qtyTk'] }}</span>&nbsp&nbsp Stok Gudang <span class="badge badge-dark">{{ $item['qtyGd'] }}</span>--}}

{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>

@push('page_scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        const tbProduk = $('#salesorderproduk_simples').DataTable({
            ajax: {
                url: '{{URL::to('searchdata')}}'
            },
            select: true,
            cache: true,
            serverSide: true,
            order: [[0, "asc"]],
            processing: true,
            autoWidth: false,
            oSearch: {"sSearch": "{{$searchquery}}"},
            columns: [
                {data: 'produk', name: 'produk'},
                {data: 'qty', name: 'qty'},
                {data: 'barcode', name: 'barcode'},
                {data: 'nama', name: 'nama'},
                {data: 'kendaraan', name: 'kendaraan'},
                {data: 'partno1', name: 'partno1'},
                {data: 'partno2', name: 'partno2'},
                {data: 'merek', name: 'merek'},
            ],
            columnDefs: [
                {
                    targets: [ 2,3,4,5,6,7 ],
                    visible: false,
                }
            ],
            language: {
                searchPlaceholder: "Pencarian",
                search: "",
                lengthMenu: "Baris: _MENU_",
            },
            initComplete: function () {
                $("#salesorderproduk_simples").show();
            }
        });
    });
</script>
@endpush
