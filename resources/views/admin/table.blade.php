<style>
    #tbRequestSum tbody tr:hover{
        /*cursor: pointer;*/
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }
</style>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody id="tbRole">
        @foreach($user as $users)
            <tr>
                <th>{{ $users->id }}</th>
                <td>{{ $users->name }}</td>
                @if($users->role == 'Admin')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @elseif($users->role == 'User')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @else
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">None</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('page_scripts')

    <script>

    </script>
@endpush

