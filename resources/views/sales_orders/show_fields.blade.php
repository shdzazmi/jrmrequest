<style>
    tr.hide-table-padding td {
        padding: 0;
    }

    .table-nopadding{
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .accordion-toggle .expand-button:after
    {
        position: absolute;
        left:.75rem;
        top: 50%;
        transform: translate(0, -50%);
        content: '-';
    }
    .accordion-toggle.collapsed .expand-button:after
    {
        content: '+';
    }
    #tbRequest tbody tr:hover{
        cursor: pointer;
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }
</style>

<div class="table-responsive table p-0">
    <table class="table-sm table table-striped table-nopadding " id="tbRequest">
        <thead>
        <tr>
            <th style="text-align: center; width:5%;">No</th>
            <th style="width:50%;">Produk</th>
            <th style="text-align: center; width:10%;">Qty</th>
            <th style="text-align: center; width:15%;">Harga</th>
            <th style="text-align: center; width:20%;">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @php $i=1 @endphp
        @foreach($listorder as $item)
            @php $produk = $produks->firstWhere('barcode', $item->barcode) @endphp
            <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
            <td>{{ $i++ }}</td>
            <td>
                {{$produk->nama}} @if($produk->kendaraan != "") • {{$produk->kendaraan}} @endif
            </td>
            <td style="text-align: center">
                {{number_format($item->qty)}} {{$produk->satuan}}
            </td>
            <td class="text-right">
                {{number_format($item->harga,0,",",".")}}
            </td>
            <td class="text-right">
                 {{number_format($item->subtotal,0,",",".")}}
            </td>
            </tr>

            <tr class="hide-table-padding">
                <td></td>
                <td colspan="4">
                    <div id="collapseOne" class="collapse in">
                        <p>
                            Barcode:&nbsp{{ $item->barcode }}&nbsp&nbsp
                            Supplier:&nbsp{{ $produk->kd_supplier }}&nbsp&nbsp
                            @if($produk->kendaraan != "")
                                <br>Kendaraan:&nbsp{{ $produk->kendaraan }}&nbsp&nbsp
                            @endif
                            <br>
                            @if($produk->merek != "")
                                Merek:&nbsp<span class="badge badge-dark">{{ $produk->merek }}</span>
                            @endif
                            @if($produk->partno1 != "")
                                Part number:&nbsp<span class="badge badge-dark">1. {{ $produk->partno1 }}</span>
                                @if($produk->partno2 != "")
                                    <span class="badge badge-dark">2. {{ $produk->partno2 }}</span>&nbsp&nbsp
                                @endif
                            @else
                                @if($produk->partno2 != "")
                                    <span class="badge badge-dark">1. {{ $produk->partno2 }}</span>&nbsp&nbsp
                                @endif
                            @endif

                            @if($produk->lokasi1 != "")
                                <br>Lokasi:&nbsp<span class="badge badge-dark">1. {{ $produk->lokasi1 }}</span>
                            @endif
                            @if($produk->lokasi2 != "")
                                <span class="badge badge-dark">2. {{ $produk->lokasi2 }}</span>&nbsp&nbsp
                            @endif
                            @if($produk->lokasi3 != "")
                                <span class="badge badge-dark">3. {{ $produk->lokasi3 }}</span>&nbsp&nbsp
                            @endif

                            Stok: <span class="badge badge-dark">{{number_format($produk->qty)}}</span>
                        </p>
                    </div></td>
            </tr>

        @endforeach
        </tbody>
        <table class="table dataTable display">
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
