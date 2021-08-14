<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/png" href="/jrm/public/favicon.png"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    @yield('third_party_stylesheets')

    @stack('page_css')

</head>

<table>
            <thead>
            <tr>
                <th></th>
                <th>Cust: {{ $serviceOrder->nama }}</th>
                <th></th>
                <th>Mobil: {{ $serviceOrder->mobil }} - {{ $serviceOrder->nopol }}</th>
                <th></th>
                <th>Tgl: {{ $serviceOrder->tanggal }}</th>
                <th></th>
                <th></th>
                <th>No: {{ $serviceOrder->no_penawaran }}</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Qty</th>
                <th>Produk</th>
                <th>Barcode</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number 2</th>
                @if($totaldiscount != 0)<th>Discount %</th>@endif
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Stok Toko</th>
                <th>Stok Gudang</th>
            </tr>
</thead>
<tbody>
                @php $i=1 @endphp
                @foreach($listorder as $item)
                    @php $produk = $produks->firstWhere('barcode', $item['barcode']) @endphp
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ number_format($item['qty']) }} {{$produk->satuan}}</td>
                        <td>{{ $produk->nama }} @if($produk['merek'] != "") ({{ $produk['merek'] }}) @endif</td>
                        <td>{{ $produk->barcode }}</td>
                        <td>{{ $produk->kd_supplier }}</td>
                        <td>{{ $produk->kendaraan }}</td>
                        <td>
                            @if($produk->partno2 != "")
                                {{ $produk->partno2 }}
                            @else
                                -
                            @endif
                        </td>
                            @if($totaldiscount != 0)
                                <td class="text-right">
                                    {{$item['discount']}}%
                                </td>
                            @endif
                        <td>{{ $item['harga'] }}</td>
                        <td>{{ $item['subtotal'] }}</td>
                        <td>{{ $produk->qtyTk }}</td>
                        <td>{{ $produk->qtyGd }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>SUBTOTAL PART</b></td>
                    <td><b>{{ $totalproduk }}</b></td>
                </tr>
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
                        <td>{{ number_format($item['qty']) }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $barcode }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        @if($totaldiscount != 0)
                            <td class="text-right">
                                {{$item['discount']}}%
                            </td>
                        @endif
                        <td>{{ $item['harga'] }}</td>
                        <td>{{ $item['subtotal'] }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>SUBTOTAL JASA</b></td>
                    <td><b>{{ $totaljasa }}</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td><b>{{ $grandtotal }}</b></td>
                </tr>
</tbody>
 </table>
 </html>
