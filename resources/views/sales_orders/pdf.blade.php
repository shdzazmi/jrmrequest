<section class="content-header">
    <div class="container-fluid">
        <div class="col-sm-10 offset-md-1">
            <div class="col-sm-6">
                <h1>Sales Order Details</h1>
            </div>

        </div>
    </div>
</section>

<div class="col-sm-10 offset-md-1">
    <div class="content px-3">
        <div class="position-relative" style="height: 180px">
            <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-warning text-lg">
                    {{ $salesOrder->status }}
                </div>
            </div>
            <div class="card">
                <div class="card-header pt-4">
                    <h4></i> SO{{ $salesOrder->id }}</h4>
                    {!! Form::label('nama', 'Nama: ') !!}
                    {{ $salesOrder->nama }} &nbsp
                    {!! Form::label('tanggal', 'Tanggal:') !!}
                    {{ $salesOrder->tanggal }} &nbsp
                </div>
                <div class="card-body p-0">
                    @include('sales_orders.show_fields')
                </div>
                <div class="card-footer">
                    <a class="btn btn-default" href="{{ route('salesOrders.index') }}">
                        Back
                    </a>
                    <a class="btn btn-outline-info" href="{{ route('salesOrder.getPdf',[$salesOrder->id]) }}">Download PDF</a>
                </div>

            </div>

        </div>

    </div>

</div>
