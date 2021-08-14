{{ $ketnama }} @if($kendaraan != "") • {{$kendaraan}} @endif
<br/>
<span class="badge bg-secondary">{{ $barcode }}</span>
<span class="badge bg-secondary">{{ $kd_supplier }}</span>
<span class="badge bg-primary">{{ $merek }}</span>
@if($partno1 != "")
    <br>
    Part number:
    <span class="badge badge-dark">{{ $partno1 }}</span>
    @if($partno2 != "")
        <span class="badge badge-dark">{{ $partno2 }}</span>&nbsp&nbsp
    @endif
@else
    @if($partno2 != "")
        <span class="badge badge-dark">{{ $partno2 }}</span>&nbsp&nbsp
    @endif
@endif

@if($lokasi1 != "")
    <br>Lokasi:&nbsp<span class="badge badge-dark">{{ $lokasi1 }}</span>
@endif
@if($lokasi2 != "")
    <span class="badge badge-dark">{{ $lokasi2 }}</span>&nbsp&nbsp
@endif
@if($lokasi3 != "")
    <span class="badge badge-dark">{{ $lokasi3 }}</span>&nbsp&nbsp
@endif
<br>
Harga:
1 <span class="badge badge-dark">{{ number_format($harga) }}</span>&nbsp&nbsp
2 <span class="badge badge-dark">{{ number_format($harga2) }}</span>&nbsp&nbsp
3 <span class="badge badge-dark">{{ number_format($harga3) }}</span>&nbsp&nbsp
Min <span class="badge badge-dark">{{ number_format($hargamin) }}</span>&nbsp&nbsp
<br>
Stok: <span class="badge badge-primary">{{ $qty }}</span> {{ $satuan }}
<br>
Stok Toko: <span class="badge badge-dark">{{ $qtyTk }}</span>&nbsp&nbsp Stok Gudang <span class="badge badge-dark">{{ $qtyGd }}</span>
