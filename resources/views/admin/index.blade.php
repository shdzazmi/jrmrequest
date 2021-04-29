@extends('layouts.app')
@section('title', 'Admin')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-outline card-red">
                    <div class="card-header">
                        <h3 class="card-title"><b>Role management</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @include('admin.table')
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card card-outline card-red">
                    <div class="card-header">
                        <h3 class="card-title"><b>User management</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-danger" data-toggle = 'modal' data-target = '#myModal'>
                            <i class="fas fa-user"></i> Tambah user
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <!--Modal-->
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Register a new membership</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @include('admin.create')
                </div>
            </div>
        </div>
    </div>



@endsection

@push('page_scripts')
    {{--Modal Script--}}
    <script>
        $(document).ready(function(){
            $(".show-modal").click(function(){
                $("#myModal").modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        });
    </script>

    <script type="text/javascript">
        $("#btnModal").click(function(){});
    </script>
@endpush
