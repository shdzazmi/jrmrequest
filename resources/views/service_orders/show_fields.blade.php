<style>
    tr.hide-table-padding td {
        padding: 0;
    }
     div.dataTables_wrapper {
         width:100% !important;
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
                    $produk = $produks->firstWhere('barcode', $item['barcode'])
                @endphp
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{$item['ketnama']}}<br>
                        <span class="badge badge-pill bg-primary">{{$produk->barcode}}</span>
                        <span class="badge badge-pill bg-primary">{{$produk->kd_supplier}}</span>
                        <span class="badge badge-pill bg-primary">{{$produk->merek}}</span>
                        @if($produk->partno1 != "")
                            <br/>PN1: {{$produk->partno1 }}
                        @endif
                        @if($produk->partno2 != "")
                            <br/>PN2: {{$produk->partno2 }}
                        @endif
                    </td>
                    <td>
                        {{$item['keterangan']}}
                    </td>
                    <td style="text-align: center">
                        {{number_format($item['qty'])}} {{$produk->satuan}}
                    </td>
                    <td class="text-right">
                        {{number_format($item['harga'],0,",",".")}}
                    </td>
                    @if($totaldiscount != 0)
                        <td class="text-right">
                            @if($item['discount'] != 0)
                                {{floatval($item['discount'])}}%
                            @endif
                        </td>
                    @endif
                    <td class="text-right">
                        {{number_format($item['subtotal'],0,",",".")}}
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
            <td style="text-align: right; font-size: 14px"><b>Subtotal Produk:</b></td>
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
                global $barcode;
                $barcode = $item['barcode'];
                if($barcode == null){
                    $barcode = $item['bcodejasa'];
                }
                    $produk = $services->firstWhere('barcode', $barcode)
                @endphp
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{$item['ketnama']}} <span class="badge badge-pill bg-primary">{{$produk->barcode}}</span>

                    </td>
                    <td>
                        {{$item['keterangan']}}
                    </td>
                    <td style="text-align: center">
                        {{number_format($item['qty'])}}
                    </td>
                    <td class="text-right">
                        {{number_format($item['harga'],0,",",".")}}
                    </td>
                    @if($totaldiscount != 0)
                        <td class="text-right">
                            @if($item['discount'] != 0)
                                {{floatval($item['discount'])}}%
                            @endif
                        </td>
                    @endif
                    <td class="text-right">
                        {{number_format($item['subtotal'],0,",",".")}}
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
            <td style="text-align: right; font-size: 14px"><b>Subtotal Jasa:</b></td>
            <td style="text-align: right"><b>{{number_format($totaljasa)}}</b></td>
            </tfoot>
        </table>
    @endif

    <table class="table table-condensed table-borderless pb-0 mb-0">
        <tbody>
        @if($serviceOrder->ppn == 1)
            <tr>
                <td class="text-right" style="width:80%;">
                    <b>Total:</b>
                </td>
                <td  class="text-right" style="width:20%;">
                    <b>{{number_format($grandtotal)}}</b>
                </td>
            </tr>
            <tr>
                <td class="text-right" style="width:80%;">
                    <b>PPN 10%:</b>
                </td>
                <td  class="text-right" style="width:20%;">
                    <b>{{number_format(0.1*$grandtotal)}}</b>
                </td>
            </tr>
            <tr>
                <td class="text-right" style="width:80%;">
                    <h5>Grand total:</h5>
                </td>
                <td  class="text-right" style="width:20%;">
                    <h5>{{number_format(0.1*$grandtotal+$grandtotal)}}</h5>
                </td>
            </tr>
        @else
            <tr>
                <td class="text-right" style="width:80%;">
                    <h5>Grand total:</h5>
                </td>
                <td  class="text-right" style="width:20%;">
                    <h5>{{number_format($grandtotal)}}</h5>
                </td>
            </tr>
        @endif

        </tbody>
    </table>

</div>
