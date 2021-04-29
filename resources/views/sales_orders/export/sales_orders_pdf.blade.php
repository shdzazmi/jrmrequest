<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body style="font-size:16px;" class="m-0 p-0">
No. Order: <strong>SO{{ $salesOrder->id }}</strong>
Customer: <strong>{{ $salesOrder->nama }}</strong>
Tanggal: <strong>{{ $salesOrder->tanggal }}</strong>
<hr>
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
                <strong>{{$item->nama}}</strong>
                <div>
                        Barcode: <strong>{{ $item->barcode }}</strong>
                        Supplier: <strong>{{ $item->kd_supplier }}</strong><br>
                        @if($item->kendaraan != "")
                            Kendaraan: <strong>{{ $item->kendaraan }}</strong>
                        @endif
                        <br>
                        @if($item->partno1 != "")
                            Part number: <span class="badge badge-dark">1. {{ $item->partno1 }}</span>
                            @if($item->partno2 != "")
                                <span class="badge badge-dark">2. {{ $item->partno2 }}</span>
                            @endif
                        @else
                            Part number: <span class="badge badge-dark">1. {{ $item->partno2 }}</span>
                        @endif


                        @if($item->lokasi1 != "")
                            <br>Lokasi: <span class="badge badge-dark">1. {{ $item->lokasi1 }}</span>
                        @endif
                        @if($item->lokasi2 != "")
                            <span class="badge badge-dark">2. {{ $item->lokasi2 }}</span> 
                        @endif
                        @if($item->lokasi3 != "")
                            <span class="badge badge-dark">3. {{ $item->lokasi3 }}</span> 
                        @endif

                        <br>
                        Stok: {{number_format($item->stok)}}

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


                    

</body>

</html>