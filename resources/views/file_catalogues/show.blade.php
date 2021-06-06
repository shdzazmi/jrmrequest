@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>File Catalogue Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('fileCatalogues.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div id='viewer' style='width: 1024px; height: 600px; margin: 0 auto;'></div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('page_scripts')

@endpush
