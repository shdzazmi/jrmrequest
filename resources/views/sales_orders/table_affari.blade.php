
<div class="table-responsive">

    <table class="table dataTable display" id="salesOrders-tableaffari">
        <thead>
            <tr>
                <th>No. Transaksi</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Operator</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@push('page_scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>

        var start_date;
        var end_date;
        var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
            var dateStart = ConvertDateFromDiv(start_date);
            var dateEnd = ConvertDateFromDiv(end_date);
            var evalDate= ConvertDateFromDiv(aData[3]);
            // console.log(dateStart);

            if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
                ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
                ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
                ( dateStart <= evalDate && evalDate <= dateEnd ) )
            {
                return true;
            }
            return false;
        });

        //convert tanggal
        //04-05-2021
        function ConvertDateFromDiv(divTimeStr) {
            var tmstr = divTimeStr.toString().split(' ');
            var dt = tmstr[0].split('-');
            var str = dt[2] + "/" + dt[1] + "/" + dt[0] + " " + tmstr[1]; //+ " " + tmstr[1]//'2013/01/20 3:20:24 pm'
            var time = new Date(str);
            if (time == "Invalid Date") {
                time = new Date(divTimeStr);
            }
            return time;
        }

        $(document).ready( function () {

            //Datatable init
            var tableAffari = $('#salesOrders-tableaffari').DataTable({
                select: true,
                order: [[0, "desc"]],
                pageLength: 50,
                autoWidth: false,
                ajax: {
                    url: '{{URL::to('salesOrdersAffari')}}'
                },
                columns: [
                    {data: 'uid', name: 'uid', align:'center'},
                    {data: 'nama', name: 'nama'},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'operator', name: 'operator'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    searchPlaceholder: "Pencarian",
                    search: "",
                    lengthMenu: "Baris: _MENU_",
                },
                initComplete: function () {
                    $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
                },
            });


            //apply date filter
            $('#daterangeAffari').on('change', function () {
                tableAffari.draw();
            });

            //menangani proses saat apply date range
            $('#daterangeAffari').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM-DD-YYYY H:mm:ss') + ' - ' + picker.endDate.format('MM-DD-YYYY H:mm:ss'));
                start_date=picker.startDate.format('MM-DD-YYYY H:mm:ss');
                end_date=picker.endDate.format('MM-DD-YYYY H:mm:ss');
                $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
                tableAffari.draw();
            });

            $('#daterangeAffari').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
                start_date='';
                end_date='';
                $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
                tableAffari.draw();
            });

            //daterangepicker
            $(function() {
                $('input[name="daterangeAffari"]').daterangepicker({
                    timePicker24Hour: true,
                    opens: 'right',
                    autoUpdateInput: false,
                    alwaysShowCalendars: true,
                    locale: {
                        format: 'DD-MM-YYYY H:mm:ss',
                        cancelLabel: 'Clear'
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, function(start, end, label) {
                    // Create date inputs
                    // console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                });

            });


        });

        function format ( d ) {
            // `d` is the original data object for the row
            return '';
        }

    </script>

@endpush

