@if( $status== 'Proses')
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Selesai"]) }}"><span class="badge badge-pill badge-success">Selesai</span></a>
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Void"]) }}"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
@elseif( $status== 'Selesai')
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Void"]) }}"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
@elseif( $status== 'Batal')
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Selesai"]) }}"><span class="badge badge-pill badge-success">Selesai</span></a>
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Void"]) }}"><span class="badge badge-pill badge-secondary">Void</span></a>
        </div>
    </td>
@else
    <td>
        <a href="javascript:void(0)" class="badge badge-pill badge-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $status }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Batal"]) }}"><span class="badge badge-pill badge-danger">Batal</span></a>
            <a class="dropdown-item" href="{{ route("salesOrder.editStatus", [$id, "Selesai"]) }}"><span class="badge badge-pill badge-success">Selesai</span></a>
        </div>
    </td>
@endif

