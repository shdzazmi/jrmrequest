<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Buat sales order'); ?>
<style>

    #myBtn {
        bottom: 20px;
        border: none;
        outline: none;
        color: white;
        padding: 15px;
        border-radius: 50%;

        display: inline-block;
        background-color: #007afe;
        text-align: center;
        position: fixed;
        right: 20px;
        transition: background-color .3s,
        opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
    }
    #myBtn:active {
        background-color: #555;
    }
    #myBtn.show {
        opacity: 1;
        visibility: visible;
    }
    #myBtn::after {
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
    }
    #myBtn:hover {
        cursor: pointer;
        background-color: #509fff;
    }

</style>

<?php $__env->startSection('content'); ?>

    <div class="animate__animated animate__fadeIn preloader flex-column justify-content-center align-items-center">
        <img class="animate__animated animate__rubberBand animate__infinite" src="<?php echo e(asset('storage/logo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
        <h3>Memuat . . .</h3>
    </div>

    <div class = "row">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-12">
                    <h5>Create Sales Order</h5>
                </div>
            </div>
        </section>
    </div>

    <div class = "col-sm-12">
        <?php echo $__env->make('adminlte-templates::common.errors', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class = "row">
        <div class = "col-sm-3">
            <div class="content px-3 pb-2">
                <?php echo $__env->make('sales_orders.fields', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <button class="btn btn-primary btn-block" onclick="uploadSalesOrder()">Check out</button>
                <a href="<?php echo e(route('salesOrders.index')); ?>" class="btn btn-default btn-outline btn-block">Cancel</a>
            </div>
        </div>
        <div class = "col-sm-9">
            <div class="content px-3">
                <?php echo $__env->make('sales_orders.list_order', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <div class = "row">
        <div class="col-sm-12">
            <div class="content px-3" style="height: 300px">
                <?php echo $__env->make('sales_orders.table_produk', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('page_scripts'); ?>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/natural.js"></script>

    <script>
        $(document).ready(function() {
            $('.preloader').addClass('animate__animated animate__fadeOutUpBig');
        });
        var tbOrder = document.getElementById("table-body");
        function getTotalPrice() {
            var total = 0;
            var table = document.getElementById("table-body");
            var totaltext = document.getElementById("total-text");
            for(var i = 0; i < table.rows.length; i++)
            {
                total = total + parseFloat(table.rows[i].cells[6].innerHTML);
            }
            totaltext.innerHTML = numberFormat(total);
        }

        function updateSubtotal(id) {
            var qty =  Number($(id).closest("tr").find("input[id*='qtyInput']").val());
            var price = Number($(id).closest("tr").find("input[id*='hargaInput']").val());
            $(id).closest("tr").find('td:eq(6)').text(qty*price);
            getTotalPrice();
            return false;
        }

        function updateInputHarga(id) {
            Number($(id).closest("tr").find("input[id*='hargaInput']").val($(id).attr('data-value')));
            updateSubtotal(id);
        }

        function uploadSalesOrder() {

            var td_content = $('#table-body td').text();
            var table = document.getElementById( "table-body" );
            var nama = document.getElementById( "nama_input" ).value;
            var tanggal = document.getElementById( "tanggal_input" ).value;
            var url = '<?php echo e(route("salesOrder.updateData")); ?>';
            var urlOrder = '<?php echo e(route("salesOrders.store")); ?>';
            if(td_content !== "" && nama !== "" && tanggal !== ""){
                tampilLoading('Menambahkan data...');
                // listorder
                for ( var i = 0; i < table.rows.length; i++ ) {
                    var harga = table.rows[i].cells[4].children[0].children[0].value;
                    var qty = table.rows[i].cells[5].children[0].value;
                    var subtotal = harga*qty;
                    var data = {
                        id: table.rows[i].cells[0].innerHTML,
                        uid : document.getElementById( "uid_input" ).value,
                        produk: table.rows[i].cells[1].innerHTML,
                        barcode: table.rows[i].cells[2].innerHTML,
                        kendaraan: table.rows[i].cells[3].innerHTML,
                        keterangan: table.rows[i].cells[7].children[0].value,
                        harga: harga,
                        qty: qty,
                        subtotal: subtotal.toString()
                    };
                    // console.log(data)
                    $.ajax({
                        url: url,
                        method:"POST",
                        data: data,
                        cache: false,
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                    });
                }

                // salesorder
                var dataorder = {
                    uid : document.getElementById( "uid_input" ).value,
                    nama,
                    tanggal,
                    tipeharga : $('#tipeharga').find(":selected").val(),
                    status : document.getElementById( "status_input" ).value,
                    operator : document.getElementById( "operator_input" ).value,
                };
                // console.log(dataorder)
                $.ajax({
                    url: urlOrder,
                    method:"POST",
                    data: dataorder,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data){
                         var url = '<?php echo e(route("salesOrders.show", [":id"])); ?>';
                         url = url.replace(':id', data.id);
                         window.onbeforeunload = null;
                         window.location.href = url;
                    },
                    error: function (data){
                        toastError("Gagal!", "Terjadi kesalahan internal.");
                        window.onbeforeunload = null;
                        window.location.href = '<?php echo e(route("salesOrders.index")); ?>';
                    }
                });

            } else {
                toastError("Gagal!", "Lengkapi data.")
            }
        }

        window.onbeforeunload = confirmExit;

        function confirmExit()
        {
            deleteAllRow();
            return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
        }

        //Get the button
        var mybutton = $('#myBtn');

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                mybutton.addClass('show');
            } else {
                mybutton.removeClass('show');
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/sales_orders/create.blade.php ENDPATH**/ ?>
