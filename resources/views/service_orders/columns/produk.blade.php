<div>{{ $ketnama }} @if($kendaraan != "") • {{ $kendaraan }} @endif</div>
<span class="badge bg-dark">{{ $barcode }}</span>
<span class="badge bg-primary">{{ $kd_supplier }}</span>
<span class="badge bg-primary">{{ $merek }}</span><br/>

@if($partno1 != "")
    <span class="badge badge-pill bg-secondary">PN1</span> {{ $partno1 }}<br/>
@else
    <span class="badge badge-pill bg-secondary">PN1</span> -<br/>
@endif

@if($partno2 != "")
    <span class="badge badge-pill bg-secondary">PN2</span> {{ $partno2 }}<br/>
@else
    <span class="badge badge-pill bg-secondary">PN2</span> -<br/>
@endif
