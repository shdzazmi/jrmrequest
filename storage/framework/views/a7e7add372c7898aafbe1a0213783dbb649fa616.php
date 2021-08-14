<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php use Illuminate\Support\Arr;

        echo e(config('app.name')); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('storage/logo.png')); ?>"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
          rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.css')); ?>">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
          integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
          crossorigin="anonymous"/>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css"/>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <?php echo $__env->yieldContent('third_party_stylesheets'); ?>

    <?php echo $__env->yieldPushContent('page_css'); ?>
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
            font-size: 15px;
            transition: background 0.2s linear;
        }
    </style>
</head>

    <body id="mainbody"
          <?php if(Auth::user()->dark_theme == 1): ?>
            class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed dark-mode"
          <?php else: ?>
            class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed"
          <?php endif; ?>
          >
<div class="se-pre-con"></div>

<div class="wrapper">

    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-dark border-bottom-0">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- search -->





            <li class="nav-item form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input id="cariproduk" class="form-control form-control-navbar rounded-pill border-0 pr-4" type="search" placeholder="Cari produk" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar rounded-pill border-0 ml-n4" id="cariproduksubmit" style="z-index: 3;" onclick="submitpencarian()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </li>

            <li class="nav-item pt-2 pl-2">
                <?php if(Auth::user()->dark_theme == 1): ?>
                    <input type="checkbox" class="checkboxz" id="darkmodeicon" onchange="toggle_darkmode()" checked/>
                    <label class="labelz" for="darkmodeicon">
                        <i class="fas fa-moon" style="color: #FFFF00FF"></i>
                        <i class="fas fa-sun" style="color: #ccd2d9"></i>
                        <div class="ball"></div>
                    </label>
                <?php else: ?>
                    <input type="checkbox" class="checkboxz" onchange="toggle_darkmode()" id="darkmodeicon"/>
                    <label class="labelz" for="darkmodeicon">
                        <i class="fas fa-moon" style="color: #FFFF00FF"></i>
                        <i class="fas fa-sun" style="color: #ccd2d9"></i>
                        <div class="ball"></div>
                    </label>
                <?php endif; ?>

            </li>
            <!-- notif -->












            <!-- user -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo e(asset('storage/logo.png')); ?>"
                         class="user-image img-circle elevation-1" alt="User Image">
                    <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?php echo e(asset('storage/logo.png')); ?>"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            <?php echo e(Auth::user()->name); ?>

                            <small>Member since <?php echo e(Auth::user()->created_at->format('d M. Y')); ?></small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="JavaScript:void(0)" class="btn btn-default btn-flat float-right"
                           onclick="document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
<?php echo $__env->make('layouts.sidebar', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </div>

    <!-- Main Footer -->

</div>


<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>

    function toggle_darkmode() {
        $.ajax({
            url: '<?php echo e(route('darkmode')); ?>',
            method: "GET",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success: function (data){
                // console.log(data)
                var icon = document.getElementById("darkmodeicon");
                var element = document.getElementById("mainbody");
                element.classList.toggle("dark-mode");
                if (data === 1){
                    icon.classList.toggle("fas fa-moon");
                } else if (data === 0){
                    icon.classList.toggle("fas fa-adjust");
                }
            }
        });
    }

    var cariprodukinput = document.getElementById("cariproduk")
    cariprodukinput.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            submitpencarian();
            event.preventDefault();
        }
    });

    function submitpencarian(){
        var query = cariprodukinput.value;
        var url = '<?php echo e(route("search", [":q"])); ?>';
        console.log(query);
        url = url.replace(':q', query);
        window.location.href = url;
    }

    function tampilLoading(title){
        Swal.fire ({
            title: title,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });
    }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
        integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"
        integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg=="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
        integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA==" crossorigin="anonymous"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>


<script>
    $(function () {
        bsCustomFileInput.init();
    });

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    function numberFormat($number){
        return new Intl.NumberFormat().format(parseInt($number));
    }

    function toastError(title, desc){
        Swal.fire({
            title: title,
            text: desc,
            icon: "error", //built in icons: success, warning, error, info
            toast: "true",
            timer: 2000, //timeOut for auto-close
            showConfirmButton: false,
            position: 'top'
        });
    }

    function toastSuccess(title, desc){
        Swal.fire({
            title: title,
            text: desc,
            icon: "success", //built in icons: success, warning, error, info
            toast: "true",
            timer: 2000, //timeOut for auto-close
            showConfirmButton: false,
            position: 'top'
        });
    }

    function addzeros(number) {
        var num = '' + number;
        while (num.length < 3) {
            num = '0' + num;
        }
        return num;
    }

</script>

<?php echo $__env->yieldContent('third_party_scripts'); ?>

<?php echo $__env->yieldPushContent('page_scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/layouts/app.blade.php ENDPATH**/ ?>
