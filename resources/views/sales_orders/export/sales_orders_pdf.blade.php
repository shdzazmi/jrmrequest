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
<body>
<table class="table table-nopadding" >
    <tr>
        <td class="pl-3" style="width: 20%; text-align: center; vertical-align: middle; border-color: white">
            <img src="D:\xampp74\htdocs\jrm\public\storage\JRM.png>" alt="logo" style="width:100px;height:100px;">
        </td>
        <td class="pr-3" style="width: 80%; border-color: white">
            <h2 style="padding-bottom: 0; margin-bottom: 0;">JAYA RAYA MOBIL</h2>
            JL. A. Yani No. 25, Samarinda<br>
            Telp: 0541-747168, HP: 0813-5087-1638<br>
            <div class="box">
            <img src="D:\xampp74\htdocs\jrm\public\storage\facebook.png>" alt="logo" style="width:15px;height:15px;">
                <img src="D:\xampp74\htdocs\jrm\public\storage\instagram.png>" alt="logo" style="width:15px;height:15px;">
                <span> : <b>@jayarayamobil.smd</b> /</span>
            <img src="D:\xampp74\htdocs\jrm\public\storage\email.png>" alt="logo" style="width:15px;height:15px;">
            <span>: lisgun@gmail.com</span>
            </div>
        </td>
    </tr>
</table>

<hr style="border-top: 2px solid black; margin-top: 0.1em; margin-bottom: 0.1em;">
<hr style="border-top: 2px solid black; margin-top: 0.1em; margin-bottom: 0.1em;">
<br>

<p>Dengan hormat,</p>
<p class="a">Bersama ini kami ingin memberikan penawaran harga dari kami sebagai berikut:</p>

<div class="table-responsive table p-0">
    <table class="table-sm table table-bordered table-nopadding" id="tbRequest">
        <thead>
        <tr>
            <th style="width:5%;">No</th>
            <th style="width:45%;">Produk</th>
            <th style="text-align: center; width:7%;">Qty</th>
            <th style="text-align: center; width:8%;">Satuan</th>
            <th style="text-align: center; width:15%;">Harga</th>
            <th style="text-align: center; width:20%;">Subtotal</th>
        </tr>
        </thead>
        <tbody>

        @php $i=1 @endphp
        @foreach($listorder as $item)
            <tr>
            <td style="text-align: center">{{ $i++ }}</td>
            <td>
                <strong>{{$item->nama}}</strong>
            </td>
            <td style="text-align: center">
                {{number_format($item->qty)}}
            </td>
            <td style="text-align: center">
                {{$item->satuan}}
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
        <table class="table-sm table table-bordered table-nopadding">
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

<p style="font-size:12px;"><b>*Stok barang dan harga tidak bersifat mengikat selama tidak ada Down Payment (DP) atau Konfirmasi pengambilan*</b></p>
<p class="a">Demikian informasi yang kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terimakasih.</p>
<p>Samarinda, {{$tanggal}}</p>

</body>

</html>
