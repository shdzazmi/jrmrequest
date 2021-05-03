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
                <th>Cust: {{ $salesOrder->nama }}</th>
                <th></th>
                <th>Tgl: {{ $salesOrder->tanggal }}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>No: SO{{ $salesOrder->id }}</th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Qty</th>
                <th>Produk</th>
                <th>Barcode</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Stok Toko</th>
                <th>Stok Gudang</th>
            </tr>
</thead>
<tbody>
                @php $i=1 @endphp
                @foreach($listorder as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ number_format($item->qty) }} {{$item->satuan}}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->barcode }}</td>
                    <td>{{ $item->kd_supplier }}</td>
                    <td>{{ $item->kendaraan }}</td>
                    <td>
                        @if($item->partno2 != "")
                            {{ $item->partno2 }}
                        @else
                            -
                        @endif
                    </td>
                    <td>@if($item->lokasi1 != "")
                            {{ $item->lokasi1 }},
                        @endif
                        @if($item->lokasi2 != "")
                            {{ $item->lokasi2 }},
                        @endif
                        @if($item->lokasi3 != "")
                            {{ $item->lokasi3 }}
                        @endif
                    </td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->subtotal }}</td>
                    <td>{{ $item->stokTk }}</td>
                    <td>{{ $item->stokGd }}</td>
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
                    <td></td>
                    <td><b>TOTAL</b></td>
                    <td><b>{{ $totalharga }}</b></td>

                </tr>
</tbody>
 </table>
 </html>
