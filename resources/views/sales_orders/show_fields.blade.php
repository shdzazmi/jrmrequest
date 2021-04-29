
<div class="table-responsive p-0">
    <table class="table table-bordered" id="tbRequest">
        <thead>
        <tr>
            <th style="width:5%;">No</th>
            <th style="width:60%;">Produk</th>
            <th style="width:5%;">Qty</th>
            <th style="width:15%;">Harga</th>
            <th style="width:15%;">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @php $i=1 @endphp
        @foreach($listorder as $item)
            <tr>
            <td>{{ $i++ }}</td>
            <td>
                <h5></i>{{$item->nama}}</h5>
                <div>
                    <p>
                        Barcode:&nbsp<strong>{{ $item->barcode }}</strong>&nbsp&nbsp
                        Supplier:&nbsp<strong>{{ $item->kd_supplier }}</strong>&nbsp&nbsp
                        @if($item->kendaraan != "")
                            <br>Kendaraan:&nbsp<strong>{{ $item->kendaraan }}</strong>&nbsp&nbsp
                        @endif
                    <br>
                        @if($item->partno1 != "")
                            Part number:&nbsp<span class="badge badge-dark">1. {{ $item->partno1 }}</span>
                            @if($item->partno2 != "")
                                <span class="badge badge-dark">2. {{ $item->partno2 }}</span>&nbsp&nbsp
                            @endif
                        @else
                            Part number:&nbsp<span class="badge badge-dark">1. {{ $item->partno2 }}</span>
                        @endif


                        @if($item->lokasi1 != "")
                            <br>Lokasi:&nbsp<span class="badge badge-dark">1. {{ $item->lokasi1 }}</span>
                        @endif
                        @if($item->lokasi2 != "")
                            <span class="badge badge-dark">2. {{ $item->lokasi2 }}</span>&nbsp&nbsp
                        @endif
                        @if($item->lokasi3 != "")
                            <span class="badge badge-dark">3. {{ $item->lokasi3 }}</span>&nbsp&nbsp
                        @endif

                        <br>
                        Stok: {{number_format($item->stok)}}

                    </p>
                </div>
            </td>
            <td>
                {{number_format($item->qty)}}
            </td>
            <td>
                {{number_format($item->harga,0,",",".")}}
            </td>
            <td>
                 {{number_format($item->subtotal,0,",",".")}}
            </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
