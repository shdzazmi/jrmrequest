<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Home'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/home.css')); ?>"/>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome, <?php echo e(Auth::user()->name); ?>!</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="row mb-2">

            <div class="col-lg-3 col-sm-3 p-3">
                <a href="<?php echo e(route('salesOrders.index')); ?>" class="cardz kembali" style="align-items: center; height: 380px;">
                    <div class="overlayz"></div>
                    <div class="circlez" style="margin-top: 50px">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(0.64,0,0,0.64,112.16018402099613,82.16000000000005)"><g xmlns="http://www.w3.org/2000/svg"><g><g><g><path d="m337.009 493.087v-432.049c0-10.446-8.468-18.913-18.914-18.913h-264.14c-10.446 0-18.913 8.468-18.913 18.913v432.049c0 10.446 8.468 18.913 18.913 18.913h264.141c10.445 0 18.913-8.468 18.913-18.913z" fill="#66b46b" data-original="#ffc250" style="" class=""/><path d="m380.107 42.124h-63.299c10.446 0 18.914 8.468 18.914 18.913v432.049c0 10.446-8.468 18.913-18.914 18.913h63.299c10.446 0 18.914-8.468 18.914-18.913v-432.048c0-10.446-8.468-18.914-18.914-18.914z" fill="#407843" data-original="#eab14d" style="" class=""/><path d="m65.955 474.326v-394.528c0-3.734 3.027-6.76 6.76-6.76h288.632c3.734 0 6.76 3.027 6.76 6.76v394.528c0 3.734-3.027 6.76-6.76 6.76h-288.632c-3.734 0-6.76-3.026-6.76-6.76z" fill="#f5f5f5" data-original="#f5f5f5" style="" class=""/><path d="m361.347 73.038h-63.299c3.734 0 6.76 3.027 6.76 6.76v394.528c0 3.734-3.027 6.76-6.76 6.76h63.299c3.734 0 6.76-3.027 6.76-6.76v-394.528c0-3.733-3.026-6.76-6.76-6.76z" fill="#eaeaea" data-original="#eaeaea" style="" class=""/><path d="m257.21 23.538v-9.957c0-7.5-6.08-13.581-13.581-13.581h-53.197c-7.501 0-13.581 6.081-13.581 13.581v9.957c0 3.067-2.487 5.554-5.554 5.554h-22.14c-7.365 0-13.336 5.971-13.336 13.336v30.61h162.419v-30.61c0-7.365-5.971-13.336-13.336-13.336h-22.14c-3.067 0-5.554-2.487-5.554-5.554z" fill="#c2d0da" data-original="#c2d0da" style="" class=""/></g><g><g fill="#66b49d"><path d="m105.278 182.792v-59.538c0-6.596 5.348-11.944 11.944-11.944h59.538c6.596 0 11.944 5.348 11.944 11.944v59.538c0 6.596-5.348 11.944-11.944 11.944h-59.538c-6.597 0-11.944-5.348-11.944-11.944z" fill="#66b46b" data-original="#66b49d" style="" class=""/><path d="m105.278 306.832v-59.538c0-6.596 5.348-11.944 11.944-11.944h59.538c6.596 0 11.944 5.348 11.944 11.944v59.538c0 6.596-5.348 11.944-11.944 11.944h-59.538c-6.597 0-11.944-5.348-11.944-11.944z" fill="#66b46b" data-original="#66b49d" style="" class=""/><path d="m105.278 430.871v-59.538c0-6.596 5.348-11.944 11.944-11.944h59.538c6.596 0 11.944 5.348 11.944 11.944v59.538c0 6.596-5.348 11.944-11.944 11.944h-59.538c-6.597 0-11.944-5.347-11.944-11.944z" fill="#66b46b" data-original="#66b49d" style="" class=""/></g><g><path d="m141.951 174.344c-.009 0-.017 0-.026 0-3.411-.008-6.646-1.66-8.655-4.417l-9.022-12.39c-2.512-3.45-1.752-8.283 1.698-10.795 3.45-2.511 8.283-1.751 10.794 1.698l5.231 7.185 15.295-20.78c2.53-3.437 7.366-4.171 10.802-1.642 3.437 2.529 4.172 7.366 1.642 10.803l-19.112 25.965c-2.015 2.739-5.247 4.373-8.647 4.373z" fill="#f6f9f9" data-original="#f6f9f9" style=""/></g><g><path d="m141.95 301.083c-.01 0-.019 0-.028 0-3.411-.009-6.646-1.66-8.654-4.419l-9.02-12.388c-2.512-3.45-1.752-8.283 1.698-10.795 3.45-2.511 8.283-1.751 10.794 1.698l5.231 7.185 15.295-20.78c2.53-3.436 7.366-4.171 10.802-1.642 3.437 2.529 4.172 7.366 1.642 10.803l-19.112 25.965c-2.015 2.741-5.247 4.373-8.648 4.373z" fill="#f6f9f9" data-original="#f6f9f9" style=""/></g><g><path d="m141.95 422.425c-.009 0-.018 0-.026-.001-3.41-.008-6.646-1.659-8.654-4.415l-9.022-12.392c-2.512-3.45-1.751-8.282 1.699-10.794 3.452-2.512 8.283-1.75 10.794 1.699l5.23 7.184 15.296-20.78c2.53-3.436 7.366-4.171 10.802-1.642 3.437 2.529 4.172 7.366 1.642 10.803l-19.112 25.965c-2.017 2.739-5.248 4.373-8.649 4.373z" fill="#f6f9f9" data-original="#f6f9f9" style=""/></g></g><g><g><path d="m322.692 144.605h-95.515c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h95.515c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ddeafb" data-original="#ddeafb" style=""/></g><g><path d="m274.935 176.892h-47.757c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h47.757c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ddeafb" data-original="#ddeafb" style=""/></g></g><g><g><path d="m291.264 268.645h-64.086c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h64.086c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ddeafb" data-original="#ddeafb" style=""/></g><g><path d="m274.935 300.932h-47.757c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h47.757c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ddeafb" data-original="#ddeafb" style=""/></g></g></g><g><g><path d="m446.91 201.718-7.586-9.994-28.385-17.975-10.911-1.719-145.345 229.673c-3.507 5.538-6.08 11.615-7.616 17.987 17.684.219 33.735 10.383 41.494 26.276 5.104-4.113 9.497-9.037 13.004-14.575z" fill="#66b46b" data-original="#fc8086" style="" class=""/><path d="m467.43 130.992-12.265-7.767c-9.561-6.055-22.221-3.21-28.273 6.353l-11.247 17.773 3.588 7.233 34.13 21.613 9.165.842 11.254-17.784c6.048-9.558 3.205-22.211-6.352-28.263z" fill="#8c9ba6" data-original="#8c9ba6" style="" class=""/></g><path d="m416.675 146.788h29.205v55.492h-29.205z" fill="#c9e2e7" transform="matrix(.535 -.845 .845 .535 53.087 445.523)" data-original="#c9e2e7" style="" class=""/><path d="m288.561 445.967-41.385 33.35c-5.838 4.705-14.32-.666-12.563-7.955l12.454-51.671c17.684.218 33.736 10.383 41.494 26.276z" fill="#7c8b96" data-original="#7c8b96" style=""/><path d="m277.706 431.649 152.359-240.598-13.055-8.267-152.359 240.598c4.78 2.014 9.19 4.807 13.055 8.267z" fill="#407843" data-original="#fb636f" style="" class=""/></g></g></g></g></svg>

                    </div>
                    <p style="margin-top: 30px"><b>Sales Order</b></p>

                    <div class="cardz-footer clearfix">
                        <div class="one-third border-right">
                            <div class="stat text-warning"><?php echo e($prosescount); ?></div>
                            <div class="stat-value text-dark">Proses</div>
                        </div>

                        <div class="one-third border-right">
                            <div class="stat text-success"><?php echo e($selesaicount); ?></div>
                            <div class="stat-value text-dark">Selesai</div>
                        </div>

                        <div class="one-third no-border">
                            <div class="stat text-danger"><?php echo e($batalcount); ?></div>
                            <div class="stat-value text-dark">Batal</div>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-sm-3 p-3">
                <a href="<?php echo e(route('serviceOrders.index')); ?>" class="cardz merah" style="align-items: center; height: 380px;">
                    <div class="overlayz"></div>
                    <div class="circlez" style="margin-top: 50px">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(0.65,0,0,0.65,89.59999465942374,89.6)"><path xmlns="http://www.w3.org/2000/svg" d="m422.07 32h-332.14a29.639 29.639 0 0 0 -29.93 29.64v403.36a29.945 29.945 0 0 0 29.93 30h332.14a29.945 29.945 0 0 0 29.93-30v-403.36a29.639 29.639 0 0 0 -29.93-29.64z" fill="#ff7373" data-original="#c79a83" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m103 65h305v388h-305z" fill="#ffffff" data-original="#a5e2fb" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m168.41 192.88h26.9v26.89h-26.9z" fill="#85b9c9" data-original="#85b9c9" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m361.98 311h-211.98a17 17 0 0 0 -17 17.02v47.98h246v-47.98a17.013 17.013 0 0 0 -17.02-17.02z" fill="#ffa2a2" data-original="#5fcda4" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m343.16 327.45a14.335 14.335 0 1 1 0 28.67h-30.65l5.54-28.67z" fill="#ff7373" data-original="#e87187" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m291.66 355.36 11.84 20.38h-99.39l11.83-20.38z" fill="#ccd3df" data-original="#ccd3df" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m190.15 327.45 5.55 28.67h-30.66a14.335 14.335 0 1 1 0-28.67z" fill="#ff7373" data-original="#e87187" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m343.69 263.18 17.35 47.8h-210.08l17.35-47.8a17.965 17.965 0 0 1 16.89-11.84h141.6a17.965 17.965 0 0 1 16.89 11.84z" fill="#ededed" data-original="#adf0e5" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m376.71 426.06a8.386 8.386 0 0 1 -8.32 8.45l-22.71.15a8.378 8.378 0 0 1 -8.44-8.32l-.19-25.86v-.34h39.48v.06z" fill="#5c5c5c" data-original="#6d7486" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m174.95 426.06a8.4 8.4 0 0 1 -8.33 8.45l-22.7.15a8.386 8.386 0 0 1 -8.45-8.32l-.18-25.86v-.34h39.47v.06z" fill="#5c5c5c" data-original="#6d7486" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m382.77 376h-253.54a2.026 2.026 0 0 0 -2.23 1.98v20.92a2.119 2.119 0 0 0 2.23 2.1h253.54a2.119 2.119 0 0 0 2.23-2.1v-20.92a2.026 2.026 0 0 0 -2.23-1.98z" fill="#a3a3a3" data-original="#978cac" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m90 465v-403.36a29.639 29.639 0 0 1 29.93-29.64h-30a29.639 29.639 0 0 0 -29.93 29.64v403.36a29.945 29.945 0 0 0 29.93 30h30a29.945 29.945 0 0 1 -29.93-30z" fill="#bf6161" data-original="#897268" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m174 17h164v61h-164z" fill="#ffa2a2" data-original="#798795" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m174 17h30v61h-30z" fill="#bf6161" data-original="#535d66" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m79.167 226.181a6 6 0 0 1 -6-6v-101.756a6 6 0 1 1 12 0v101.756a6 6 0 0 1 -6 6z" fill="#f4f8fc" data-original="#f4f8fc" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m79.167 105.741a6 6 0 0 1 -6-6v-4.884a6 6 0 0 1 12 0v4.884a6 6 0 0 1 -6 6z" fill="#f4f8fc" data-original="#f4f8fc" style=""/><g xmlns="http://www.w3.org/2000/svg" id="_Path_9" data-name=" Path 9"><path d="m293.6 343.3h-79a6 6 0 0 1 0-12h79a6 6 0 0 1 0 12z" fill="#a3a3a3" data-original="#4ca987" style="" class=""/></g><path xmlns="http://www.w3.org/2000/svg" d="m343.585 121.816h-109.353a6 6 0 0 1 0-12h109.353a6 6 0 0 1 0 12z" fill="#77a0ad" data-original="#77a0ad" style="" class=""/><path xmlns="http://www.w3.org/2000/svg" d="m180.9 145.312a5.98 5.98 0 0 1 -4.016-1.544l-11.367-10.246a6 6 0 0 1 8.034-8.913l7.136 6.432 19.467-19.468a6 6 0 0 1 8.485 8.486l-23.495 23.5a5.984 5.984 0 0 1 -4.244 1.753z" fill="#49c160" data-original="#49c160" style="" class=""/><g xmlns="http://www.w3.org/2000/svg" fill="#77a0ad"><path d="m260.889 146.473h-26.657a6 6 0 0 1 0-12h26.657a6 6 0 0 1 0 12z" fill="#77a0ad" data-original="#77a0ad" style="" class=""/><path d="m343.585 201.117h-109.353a6 6 0 0 1 0-12h109.353a6 6 0 0 1 0 12z" fill="#77a0ad" data-original="#77a0ad" style="" class=""/><path d="m260.889 225.774h-26.657a6 6 0 1 1 0-12h26.657a6 6 0 0 1 0 12z" fill="#77a0ad" data-original="#77a0ad" style="" class=""/></g></g></svg>

                    </div>
                    <p style="margin-top: 30px"><b>Services Order</b></p>

                    <div class="cardz-footer clearfix">
                        <div class="one-half border-right">
                            <div class="stat text-dark"><?php echo e($serviceOrderCount); ?></div>
                            <div class="stat-value text-dark">Total</div>
                        </div>

                        <div class="one-half">
                            <div class="stat text-warning"><?php echo e($serviceOrderProses); ?></div>
                            <div class="stat-value text-dark">Proses</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-sm-3 p-3">
                <a href="<?php echo e(route('requestbarangs.index')); ?>" class="cardz kuning" style="align-items: center; height: 380px;">
                    <div class="overlayz"></div>
                    <div class="circlez" style="margin-top: 50px">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(-1.1,0,0,1.1,677.6000175237655,29.400016784667912)">
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M471.402,80.918h-56.927h-69.172h-56.927c-10.18,0-18.439,8.249-18.439,18.439v125.5  c0,10.19,8.259,18.439,18.439,18.439h183.026c10.18,0,18.439-8.249,18.439-18.439v-125.5  C489.841,89.167,481.582,80.918,471.402,80.918z" fill="#ffee5e" data-original="#fdd155" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M320.877,213.791c-10.18,0-18.439-8.249-18.439-18.439V80.918h-14.062  c-10.18,0-18.439,8.249-18.439,18.439v125.5c0,10.19,8.259,18.439,18.439,18.439h183.026c10.18,0,18.439-8.249,18.439-18.439V213.79  H320.877V213.791z" fill="#ebd83c" data-original="#f4c247" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M444.694,175.27v34.059c0,4.429-3.582,8.012-8.012,8.012H323.096c-4.429,0-8.012-3.582-8.012-8.012  V175.27c0-4.419,3.582-8.001,8.012-8.001h113.586C441.111,167.269,444.694,170.852,444.694,175.27z" fill="#fff7e6" data-original="#fff7e6" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M414.475,80.918v60.685c0,2.436-2.085,4.192-4.181,3.531l-30.405-9.601l-30.405,9.601  c-2.096,0.661-4.181-1.094-4.181-3.531V80.918C345.303,80.918,414.475,80.918,414.475,80.918z" fill="#ffbf7b" data-original="#fe547f" class=""/>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path style="" d="M339.77,294.163c-0.599-1.786-0.929-3.706-0.929-5.709c0-4.956,2.003-9.436,5.255-12.688   c3.252-3.252,7.733-5.255,12.688-5.255h67.613h39.263c4.894,0,9.57,2.003,12.957,5.534l34.698,36.236   c0.817,0.853,0.916,2.164,0.236,3.13l-31.982,45.451c-0.92,1.308-2.822,1.41-3.877,0.208l-29.212-33.28l-21.939-0.093   L376.41,351.41c-2.436,1.198-5.276,1.198-7.702-0.021l-87.755-43.857c-6.68-3.345-10.541-10.087-10.541-17.076   c0-2.86,0.65-5.771,2.013-8.507c4.708-9.426,16.157-13.246,25.583-8.528l41.606,20.793L339.77,294.163z" fill="#fedab2" data-original="#fedab2" class=""/>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path style="" d="M504.129,304.777l-6.433,9.143c-10.156,14.433-31.142,15.56-42.784,2.295l-8.432-9.606   l-21.939-0.093l-48.131,23.715c-2.436,1.198-5.276,1.198-7.702-0.021l-87.755-43.857c-3.07-1.537-5.536-3.797-7.314-6.464   c-0.438,0.657-0.852,1.336-1.214,2.061c-1.363,2.736-2.013,5.647-2.013,8.507c0,6.989,3.861,13.731,10.541,17.076l87.755,43.857   c2.426,1.218,5.265,1.218,7.702,0.021l48.131-23.715l21.939,0.093l29.212,33.28c1.055,1.202,2.956,1.1,3.877-0.207l31.982-45.451   c0.679-0.965,0.58-2.277-0.236-3.13L504.129,304.777z" fill="#f9ca9b" data-original="#f9ca9b" class=""/>
                                    <path style="" d="M404.508,289.423c0-0.413-0.335-0.747-0.747-0.747h-64.91c0.023,1.875,0.332,3.676,0.883,5.359   c1.983,4.035,6.126,6.815,10.925,6.815h42.424C399.391,300.85,404.508,295.734,404.508,289.423z" fill="#f9ca9b" data-original="#f9ca9b" class=""/>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <p style="margin-top: 30px"><b>Request</b></p>

                        <div class="one-full no-border">
                            <div class="stat text-dark"><?php echo e($requestcount); ?></div>
                            <div class="stat-value text-dark">Jumlah request</div>
                        </div>
                </a>
            </div>

            <?php if(Auth::user()->role == "Admin" || Auth::user()->role == "Master" || Auth::user()->role == "Dev" || Auth::user()->role == "Head"): ?>
                <div class="col-lg-3 col-sm-3 p-3">
                    <a onclick="synchronize()" href="javascript:void(0)" class="cardz biru" style="align-items: center; height: 380px;">
                        <div class="overlayz"></div>
                        <div class="circlez" style="margin-top: 50px">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 497 497" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(0.65,0,0,0.65,86.97499999999997,96.97500000000002)"><g xmlns="http://www.w3.org/2000/svg"><g><path d="m307.26 415.971-58.758 10-58.762-10 10-53.333 48.76-10 48.76 10z" fill="#968d97" data-original="#968d97" style="" class=""/></g><g><path d="m297.26 362.638-13.246-10-16.754 10 10 53.333 14.254 10 15.746-10z" fill="#877f87" data-original="#877f87" style=""/></g><g><path d="m497 305.392v-247.867c0-11.046-8.954-20-20-20h-457c-11.046 0-20 8.954-20 20v247.867l248.5 10.845z" fill="#fbfbfb" data-original="#fbfbfb" style="" class=""/></g><g><path d="m477 37.525h-30c11.046 0 20 8.954 20 20v285.113c0 11.046-8.954 20-20 20h30c11.046 0 20-8.954 20-20v-285.113c0-11.046-8.954-20-20-20z" fill="#e6e6e6" data-original="#e6e6e6" style=""/></g><g><path d="m338.774 415.971h-180.548c-12.886 0-23.331 10.446-23.331 23.331v12.673h227.21v-12.673c0-12.886-10.446-23.331-23.331-23.331z" fill="#d4cfd5" data-original="#d4cfd5" style="" class=""/></g><g><path d="m0 305.393v37.245c0 11.046 8.954 20 20 20h457c11.046 0 20-8.954 20-20v-37.245z" fill="#d4cfd5" data-original="#d4cfd5" style="" class=""/></g><g><path d="m338.774 415.971h-30c12.885 0 23.331 10.446 23.331 23.331v12.673h30v-12.673c0-12.886-10.446-23.331-23.331-23.331z" fill="#c5bec6" data-original="#c5bec6" style="" class=""/></g><g><path d="m467 305.392v37.245c0 11.046-8.954 20-20 20h30c11.046 0 20-8.954 20-20v-37.245z" fill="#c5bec6" data-original="#c5bec6" style="" class=""/></g><g><circlez cx="248.5" cy="333.483" fill="#b5adb7" r="7.5" data-original="#b5adb7" style="" class=""/></g><g><circlez cx="248.5" cy="168.088" fill="#d1eaff" r="95.828" data-original="#d3fae3" style="" class=""/></g><g><path d="m248.5 72.26c-5.104 0-10.112.403-15 1.172 45.798 7.2 80.828 46.836 80.828 94.657s-35.03 87.457-80.828 94.657c4.888.768 9.896 1.172 15 1.172 52.924 0 95.828-42.904 95.828-95.828 0-52.926-42.904-95.83-95.828-95.83z" fill="#afdbff" data-original="#b1f8d3" style="" class=""/></g><g><path d="m405.995 459.475h-314.991c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h314.991c4.143 0 7.5 3.358 7.5 7.5s-3.357 7.5-7.5 7.5z" fill="#b5adb7" data-original="#b5adb7" style="" class=""/></g><g fill="#77d1b3"><path d="m270.074 197.072c-6.268 4.675-13.728 7.146-21.574 7.146-16.818 0-30.988-11.551-34.996-27.136l4.407 4.407c1.464 1.464 3.384 2.197 5.303 2.197s3.839-.732 5.303-2.197c2.929-2.929 2.929-7.678 0-10.607l-17.749-17.749c-2.929-2.929-7.678-2.929-10.607 0l-17.749 17.749c-2.929 2.929-2.929 7.678 0 10.607s7.678 2.929 10.606 0l5.045-5.045c4.001 24.231 25.089 42.774 50.436 42.774 11.103 0 21.664-3.5 30.543-10.122 3.32-2.477 4.004-7.176 1.527-10.496-2.475-3.319-7.172-4.003-10.495-1.528z" fill="#51a0e1" data-original="#77d1b3" style="" class=""/><path d="m314.587 154.687c-2.93-2.929-7.678-2.929-10.607 0l-5.044 5.044c-4.002-24.23-25.089-42.773-50.435-42.773-11.316 0-22.041 3.623-31.013 10.477-3.291 2.514-3.922 7.221-1.407 10.513 2.514 3.292 7.221 3.921 10.513 1.407 6.334-4.839 13.91-7.396 21.907-7.396 16.818 0 30.988 11.551 34.996 27.136l-4.407-4.408c-2.93-2.929-7.678-2.929-10.608 0-2.929 2.929-2.929 7.677 0 10.607l17.749 17.749c1.407 1.407 3.314 2.197 5.304 2.197 1.989 0 3.897-.79 5.304-2.197l17.749-17.749c2.928-2.93 2.928-7.678-.001-10.607z" fill="#51a0e1" data-original="#77d1b3" style="" class=""/></g></g></g></svg>

                        </div>
                        <p style="margin-top: 30px"><b>Sinkron Data</b></p>

                        <div class="one-full no-border">
                            <div id="last_update" class="stat-value text-dark">Last update</div>
                            <div class="stat text-dark" style="font-size: 20px;"><?php echo e($timeago); ?></div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
    <script>

        function synchronize() {
            const produkAjax = '<?php echo e(route('synchronize')); ?>'
            Swal.queue([{
                title: 'Sinkronisasi Data',
                confirmButtonText: 'Sinkronkan!',
                text:
                    'Sinkron data produk untuk request dan sales order?',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                preConfirm: () => {
                    return fetch(produkAjax).then(data => Swal.fire('Sukses!','Data telah tersinkron','success'))
                }
            }])
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/home.blade.php ENDPATH**/ ?>
