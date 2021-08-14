
    <div class="card">
        <div class="card-body register-card-body">

                <div class="input-group mb-3" hidden>
                    <input type="text"
                           name="id"
                           id="ids"
                           class="form-control "
                           placeholder="Nama lengkap"
                           required>
                </div>

                <div class="input-group mb-3">
                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Nama lengkap"
                           required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text"
                           name="email"
                           id="username"
                           class="form-control"
                           placeholder="Username"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-at"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">

                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled selected hidden>Role</option>
                            <option>User</option>
                            <option>Admin</option>
                            <option>Head</option>
                            <option>Master</option>
                        </select>

                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-tools"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">

                    <select name="divisi" id="divisi" class="form-control" required>
                        <option value="" disabled selected hidden>Pilih Divisi</option>
                        <option>Sparepart</option>
                        <option>Service</option>
                        <option>Purchasing</option>
                    </select>

                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-store"></span></div>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" onclick="updateuser()">Save</button>
                    </div>
                    <!-- /.col -->
                </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    @push('page_scripts')

        <script>

            function updateuser() {
                var url = '{{ route("admin.update") }}';
                var data = {
                    id : document.getElementById("ids").value,
                    name : document.getElementById("name").value,
                    email : document.getElementById("username").value,
                    role : document.getElementById("role").value,
                    divisi : document.getElementById("divisi").value
                };

                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function (data){
                        toastSuccess("Sukses!", "User berhasil diperbarui.")
                        setTimeout(function(){
                            window.location.href = "{{ route('admin') }}";
                        }, 1000);
                    }
                });
            }


        </script>
    @endpush

