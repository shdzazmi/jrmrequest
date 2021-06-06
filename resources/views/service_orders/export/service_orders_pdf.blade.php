<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<style>
    .table-nopadding{
        padding-bottom: 0;
        margin-bottom: 0;
    }

    .box {
        align-items:center;
    }

    .a {
        text-indent: 50px;
    }
</style>
<body style="font-size: 14px">
<table class="table table-nopadding" >
    <tr>
        <td class="pl-3" style="width: 20%; text-align: center; vertical-align: middle; border-color: white">
            <img src="D:\xampp74\htdocs\jrm\public\storage\JRM.png>" alt="logo" style="width:100px;height:100px;">
        </td>
        <td class="pr-3" style="width: 80%; border-color: white">
            <h2 style="padding-bottom: 0; margin-bottom: 0;">JAYA RAYA MOBIL</h2>
            JL. A. Yani No. 25, Samarinda<br>
            Telp: 0541-747168, HP: 0821 5711 9456<br>
            <div class="box">
            <img src="D:\xampp74\htdocs\jrm\public\storage\facebook.png>" alt="logo" style="width:15px;height:15px;">
                <img src="D:\xampp74\htdocs\jrm\public\storage\instagram.png>" alt="logo" style="width:15px;height:15px;">
                <span> : <b>@jayarayamobil.smd</b> /</span>
            <img src="D:\xampp74\htdocs\jrm\public\storage\email.png>" alt="logo" style="width:15px;height:15px;">
            <span>: bengkel.jrm@gmail.com</span>
            </div>
        </td>
    </tr>
</table>

<hr style="border-top: 2px solid black; margin-top: 0.1em; margin-bottom: 0.1em;">
<hr style="border-top: 2px solid black; margin-top: 0.1em; margin-bottom: 0.1em;">
<br>

<p>Kepada Yth:<br>
    {{$serviceOrder->nama}}<br>
Tanggal: {{$serviceOrder->tanggal}}</p>
<div>Dengan hormat,</div>
<p class="a">Bersama ini kami ingin memberikan penawaran harga mengenai Service mobil <b>{{$serviceOrder->mobil}}</b> sebagai berikut:</p>

<div class="table-responsive table p-0">
    <table style="font-size: 14px" class="table-sm table table-bordered table-nopadding" id="tbRequest">
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
            <tr>
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
    </table>

    <table class="table table-sm table-nopadding p-0" style="font-size: 14px">
        <tbody>
        <tr>
            <td class="text-right" style="width:80%;"><b>Subtotal Produk:</b></td>
            <td class="text-right" style="width:20%;"><b>{{number_format($totalproduk)}}</b></td>
        </tr>
        </tbody>
    </table>

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
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        {{$produk->ketnama}}
                    </td>
                    <td>
                        {{$produk->keterangan}}
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

        </table>

        <table class="table table-sm table-nopadding" style="font-size: 14px">
            <tbody>
            <tr>
                <td class="text-right" style="width:80%;"><b>Subtotal Jasa:</b></td>
                <td class="text-right" style="width:20%;"><b>{{number_format($totaljasa)}}</b></td>
            </tr>
            </tbody>
        </table>
    @endif

    <table class="table table-sm table-nopadding" style="font-size: 14px">
        <tbody>
        <tr>
            <td class="text-right" style="width:80%;">
                <b>Grand total:</b>
            </td>
            <td  class="text-right" style="width:20%;">
                <b>{{number_format($grandtotal)}}</b>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<p style="font-size:10px;"><b>Catatan:<br>
    - Estimasi pekerjaan harus sudah direspon paling lambat 1 minggu setelah tanggal estimasi customer<br>
    - Kendaraan yang sudah selesai service harus sudah diambil paling lambat 2 minggu setelahnya setiap keterlambatan dari tenggang waktu yang ditentukan akan dikenakan biaya parkir Rp. 50.000/hari<br>
    - Apabila tidak diambil kami tidak bertanggung jawab apabila terdapat kehilangan atau kerusakan<br>
    - Garansi barang dan pekerjaan yang terkait diberikan maksimal 2 minggu atau 500 km dari km terakhir setelah dilakukan pengecekan bersama</b></p>
<div class="a">Demikian informasi yang kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</div>
<div class="p-0">Samarinda, {{$tanggal}}</div>

</body>

</html>
