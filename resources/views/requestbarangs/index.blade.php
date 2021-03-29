@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Request Barang</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('requestbarangs.create') }}">
                        Tambah baru
                    </a>
                </div>
            </div>
            <div class="alert alert-info">
                <strong>Petunjuk</strong> penggunaan form request.
            </div>
            <div class='btn-group'>
                <a href="/requestbarang/export_excel" data-toggle="tooltip" title="Export excel" class='btn btn-primary btn-s'>
                    <i class="fas fa-file-download"></i>
                </a>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('requestbarangs.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        @include('adminlte-templates::common.paginate', ['records' => $requestbarangs])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#requests-table').DataTable();
        } );
    </script>
@endpush
