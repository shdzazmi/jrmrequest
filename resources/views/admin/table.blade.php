<style>
    #tbRequestSum tbody tr:hover{
        /*cursor: pointer;*/
        transition: all .15s ease-in-out;
        background-color: #ddd;
    }
</style>

<div class="table-responsive">
    <table class="table dataTable display" id="tbAdmin">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Role</th>
                <th style="width: 80px">Action</th>
            </tr>
        </thead>
        <tbody id="tbRole">
            @php $i = 1 @endphp
        @foreach($user as $users)
            <tr>
                <th>{{$i++}}</th>
                <td>{{ $users->name }}</td>
                @if($users->role == 'Admin')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Master"]) }}">Master</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @elseif($users->role == 'User')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Master"]) }}">Master</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @elseif($users->role == 'Master')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Master"]) }}">Master</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @elseif($users->role == 'Dev')
                    <td>
                        <a href="javascript:void(0)" class="badge badge-pill badge-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $users->role }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Master"]) }}">Master</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "Admin"]) }}">Admin</a>
                            <a class="dropdown-item" href="{{ route("admin.edit", [$users->id, "User"]) }}">User</a>
                        </div>
                    </td>
                @endif
                <td>
                    <button type="button" class="btn btn-xs btn-default" onclick="edituser({{$users->id}})">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!--Modal-->
<!-- The Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit user</h5>&nbsp <h5 id="iduser" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                @include('admin.edit')
            </div>
        </div>
    </div>
</div>


@push('page_scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>

        function edituser(id) {
            var url = '{{ route("admin.show", [":id"]) }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (data){
                    $('#editModal').modal('show');
                    $('#iduser').text(data.name);
                    $('#name').val(data.name);
                    $('#username').val(data.email);
                    $('#role').val(data.role);
                },
                error: function (data) {
                    toastError("Error", data);
                }
            });
        }


    </script>
@endpush

