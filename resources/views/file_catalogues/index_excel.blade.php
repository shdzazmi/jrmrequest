@extends('layouts.app')
@section('title', 'File')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5>
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('fileCatalogues.index')}}">File</a></li>
                            <li class="breadcrumb-item active">ESTIMATE KTB MAY 2021</li>
                        </ol>
                    </h5>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="row mb-2">
            <div class="col-sm-6 col-lg-8">
                <div class="container-fluid">
                    <iframe width="1000" height="480" frameborder="0" scrolling="no" src="https://onedrive.live.com/embed?resid=7650A9230C2C9C80%211345&authkey=%21AP_ixaTGVtFuWtc&em=2&wdAllowInteractivity=False&ActiveCell='ETA'!A1&wdHideHeaders=True&wdDownloadButton=True&wdInConfigurator=True"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

