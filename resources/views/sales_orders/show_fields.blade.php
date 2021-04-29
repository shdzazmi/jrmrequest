
<div class="table-responsive table p-0">
    <table class="table-sm table table-bordered" id="tbRequest">
        <thead>
        <tr>
            <th style="text-align: center; width:5%;">No</th>
            <th style="width:50%;">Produk</th>
            <th style="text-align: center; width:5%;">Qty</th>
            <th style="text-align: center; width:20%;">Harga</th>
            <th style="text-align: center; width:20%;">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @php $i=1 @endphp
        @foreach($listorder as $item)
            <tr>
            <td>{{ $i++ }}</td>
            <td>
                {{$item->nama}}
{{--                <div>--}}
{{--                    <p>--}}
{{--                        Barcode:&nbsp<b>{{ $item->barcode }}</b>&nbsp&nbsp--}}
{{--                        Supplier:&nbsp<b>{{ $item->kd_supplier }}</b>&nbsp&nbsp--}}
{{--                        @if($item->kendaraan != "")--}}
{{--                            <br>Kendaraan:&nbsp<b>{{ $item->kendaraan }}</b>&nbsp&nbsp--}}
{{--                        @endif--}}
{{--                    <br>--}}
{{--                        @if($item->partno1 != "")--}}
{{--                            Part number:&nbsp<span class="badge badge-dark">1. {{ $item->partno1 }}</span>--}}
{{--                            @if($item->partno2 != "")--}}
{{--                                <span class="badge badge-dark">2. {{ $item->partno2 }}</span>&nbsp&nbsp--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            Part number:&nbsp<span class="badge badge-dark">1. {{ $item->partno2 }}</span>--}}
{{--                        @endif--}}


{{--                        @if($item->lokasi1 != "")--}}
{{--                            <br>Lokasi:&nbsp<span class="badge badge-dark">1. {{ $item->lokasi1 }}</span>--}}
{{--                        @endif--}}
{{--                        @if($item->lokasi2 != "")--}}
{{--                            <span class="badge badge-dark">2. {{ $item->lokasi2 }}</span>&nbsp&nbsp--}}
{{--                        @endif--}}
{{--                        @if($item->lokasi3 != "")--}}
{{--                            <span class="badge badge-dark">3. {{ $item->lokasi3 }}</span>&nbsp&nbsp--}}
{{--                        @endif--}}

{{--                        <br>--}}
{{--                        Stok: <b>{{number_format($item->stok)}}</b>--}}

{{--                    </p>--}}
{{--                </div>--}}
            </td>
            <td class="text-right">
                {{number_format($item->qty)}}
            </td>
            <td class="text-right">
                {{number_format($item->harga,0,",",".")}}
            </td>
            <td class="text-right">
                 {{number_format($item->subtotal,0,",",".")}}
            </td>
            </tr>

        @endforeach
        </tbody>
        <table class="table-sm table table-bordered">
            <tbody>
            <tr>
                <th class="text-right" style="width:80%;">
                    Total:
                </th>
                <td  class="text-right" style="width:20%;">
                    <b>{{number_format($totalharga)}}</b>
                </td>
            </tr>
            </tbody>
        </table>
    </table>
</div>
