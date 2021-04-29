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
                <th>Produk</th>
                <th>Barcode</th>
                <th>Supplier</th>
                <th>Kendaraan</th>
                <th>Part number</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Stok</th>
            </tr>
</thead>
<tbody>
                @php $i=1 @endphp
                @foreach($listorder as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->barcode }}</td>
                    <td>{{ $item->kd_supplier }}</td>
                    <td>{{ $item->kendaraan }}</td>
                    <td>
                        @if($item->partno1 != "")
                            1. {{ $item->partno1 }}
                            @if($item->partno2 != "")
                                <br>2. {{ $item->partno2 }}
                            @endif
                        @else
                            1. {{ $item->partno2 }}
                        @endif
                    </td>
                    <td>@if($item->lokasi1 != "")
                            1. {{ $item->lokasi1 }}
                        @else
                            1. -
                        @endif
                        @if($item->lokasi2 != "")
                            <br>2. {{ $item->lokasi2 }}
                        @else
                            2. -
                        @endif
                        @if($item->lokasi3 != "")
                            <br>3. {{ $item->lokasi3 }}
                        @else
                            3. -
                        @endif
                    </td>
                    <td>{{ number_format($item->harga) }}</td>
                    <td>{{ number_format($item->qty) }}</td>
                    <td>{{ number_format($item->subtotal) }}</td>
                    <td>{{ number_format($item->stok) }}</td>
                </tr>
                @endforeach
</tbody>
 </table>
 </html>
