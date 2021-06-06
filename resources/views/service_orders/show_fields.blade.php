<style>
    tr.hide-table-padding td {
        padding: 0;
    }

    .table-nopadding{
        padding-bottom: 0;
        margin-bottom: 0;
    }

</style>

<div class="table-responsive table p-0">

    @if(count($listorder) != 0)
        <table class="table-sm table table-nopadding dataTable display" id="tbRequest">
            <thead>
            <tr>
                <th style="text-align: center; width:5%;">No</th>
                <th style="width:40%;">Produk</th>
                <th style="width:10%;">Keterangan</th>
                <th style="text-align: center; width:10%;">Qty</th>
                <th style="text-align: center; width:15%;">Harga</th>
                @if($totaldiscount != 0) <th style="text-align: center; width:15%;">Discount</th> @endif
                <th style="text-align: center; width:20%;">Jumlah</th>
            </tr>
            </thead>
            <tbody>

            @php $i=1 @endphp
            @foreach($listorder as $item)
                @php
                    $produk = $produks->firstWhere('barcode', $item->barcode);
                @endphp
                <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse-{{$item->id}}">
                    <td>{{ $i++ }}</td>
                    <td>
                        {{$item->ketnama}}
                    </td>
                    <td>
                        {{$item->keterangan}}
                    </td>
                    <td style="text-align: center">
                        {{number_format($item->qty)}} {{$produk->satuan}}
                    </td>
                    <td class="text-right">
                        {{number_format($item->harga,0,",",".")}}
                    </td>
                    @if($totaldiscount != 0)
                        <td class="text-right">
                            {{$item->discount}}%
                        </td>
                    @endif
                    <td class="text-right">
                        {{number_format($item->subtotal,0,",",".")}}
                    </td>
                </tr>

            @endforeach
            </tbody>
            <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @if($totaldiscount != 0) <td></td> @endif
            <td style="text-align: right"><b>Subtotal Produk:</b></td>
            <td style="text-align: right"><b>{{number_format($totalproduk)}}</b></td>
            </tfoot>
        </table>
    @endif

    @if(count($listjasa) != 0)
        <table class="table-sm table table-nopadding dataTable display mt-3" id="tbRequest">
            <thead>
            <tr>
                <th style="text-align: center; width:5%;">No</th>
                <th style="width:40%;">Jasa Service</th>
                <th style="width:10%;">Keterangan</th>
                <th style="text-align: center; width:10%;">Qty</th>
                <th style="text-align: center; width:15%;">Harga</th>
                @if($totaldiscount != 0) <th style="text-align: center; width:15%;">Discount</th> @endif
                <th style="text-align: center; width:20%;">Jumlah</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1 @endphp
            @foreach($listjasa as $item)
                @php
                    $produk = $services->firstWhere('barcode', $item->barcode);
                @endphp
                <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapse-{{$item->id}}">
                    <td>{{ $i++ }}</td>
                    <td>
                        {{$item->ketnama}}
                    </td>
                    <td>
                        {{$item->keterangan}}
                    </td>
                    <td style="text-align: center">
                        {{number_format($item->qty)}}
                    </td>
                    <td class="text-right">
                        {{number_format($item->harga,0,",",".")}}
                    </td>
                    @if($totaldiscount != 0)
                        <td class="text-right">
                            {{$item->discount}}%
                        </td>
                    @endif
                    <td class="text-right">
                        {{number_format($item->subtotal,0,",",".")}}
                    </td>
                </tr>

            @endforeach
            </tbody>

            <tfoot>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            @if($totaldiscount != 0) <td></td> @endif
            <td style="text-align: right"><b>Subtotal Jasa:</b></td>
            <td style="text-align: right"><b>{{number_format($totaljasa)}}</b></td>
            </tfoot>
        </table>
    @endif

    <table class="table">
        <tbody>
        <tr>
            <td class="text-right" style="width:80%;">
                <h5>Grand total:</h5>
            </td>
            <td  class="text-right" style="width:20%;">
                <h5>{{number_format($grandtotal)}}</h5>
            </td>
        </tr>
        </tbody>
    </table>

</div>
