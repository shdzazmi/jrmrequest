<?php use Illuminate\Support\Arr;

$__env->startSection('title', 'Security'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/security.css')); ?>"/>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="content px-3">
        <?php echo $__env->make('flash::message', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row mb-2">

            <div class="col-lg-3 col-sm-6 col-xs-6 p-3">
                <a href="javascript:void(0)" class="cardz keluar" onclick="modal_keluar()">
                    <div class="overlayz"></div>
                    <div class="circlez">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 468.293 468.293" xml:space="preserve" class=""><g transform="matrix(0.54,0,0,0.54,87.70715557098372,107.70738983154293)">
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M451.403,454.446H138.307c-3.448,0-6.244-2.796-6.244-6.244V20.09c0-3.448,2.795-6.244,6.244-6.244  h313.096c3.448,0,6.244,2.795,6.244,6.244v428.112C457.647,451.651,454.852,454.446,451.403,454.446z" fill="#C0685D" class=""/>
                                <rect xmlns="http://www.w3.org/2000/svg" x="161.417" y="43.189" style="" width="266.839" height="381.877" fill="#ebf0f3"  class=""/>
                                <rect xmlns="http://www.w3.org/2000/svg" x="274.295" style="" width="41.122" height="468.293" fill="#e6706c" class=""/>
                                <polygon xmlns="http://www.w3.org/2000/svg" style="" points="428.274,425.074 315.417,468.293 315.417,0 428.274,43.218 " fill="#cf5e5a" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M95.613,193.935v-35.693c0-6.21-7.599-9.218-11.85-4.691l-71.261,75.903  c-2.476,2.637-2.476,6.744,0,9.382l71.261,75.903c4.251,4.528,11.85,1.52,11.85-4.691v-35.693h90.122  c3.785,0,6.853-3.068,6.853-6.853v-66.713c0-3.785-3.068-6.853-6.853-6.853H95.613z" fill="#cf5e5a" class=""/>
                            </g>
                        </svg>
                    </div>
                    <p>Karyawan Keluar</p>
                </a>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-6 p-3">
                <a href="javascript:void(0)" class="cardz kembali" onclick="modal_kembali()">
                    <div class="overlayz"></div>
                    <div class="circlez">

                        <svg width="64px" height="72px" viewBox="27 21 64 72" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->
                            <defs>
                                <polygon id="path-1" points="60.9784821 18.4748913 60.9784821 0.0299638385 0.538377293 0.0299638385 0.538377293 18.4748913"/>
                            </defs>
                            <g id="Group-12" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(27.000000, 21.000000)">
                                <g id="Group-5">
                                    <g id="Group-3" transform="translate(2.262327, 21.615176)">
                                        <mask id="mask-2" fill="white">
                                            <use xlink:href="#path-1"/>
                                        </mask>
                                        <g id="Clip-2"/>
                                        <path d="M7.17774177,18.4748913 L54.3387782,18.4748913 C57.9910226,18.4748913 60.9789911,15.7266455 60.9789911,12.3681986 L60.9789911,6.13665655 C60.9789911,2.77820965 57.9910226,0.0299638385 54.3387782,0.0299638385 L7.17774177,0.0299638385 C3.52634582,0.0299638385 0.538377293,2.77820965 0.538377293,6.13665655 L0.538377293,12.3681986 C0.538377293,15.7266455 3.52634582,18.4748913 7.17774177,18.4748913" id="Fill-1" fill="#59A785" mask="url(#mask-2)"/>
                                    </g>
                                    <polygon id="Fill-4" fill="#FFFFFF" transform="translate(31.785111, 30.877531) rotate(-2.000000) translate(-31.785111, -30.877531) " points="62.0618351 55.9613216 7.2111488 60.3692832 1.50838775 5.79374073 56.3582257 1.38577917"/>
                                    <ellipse id="Oval-3" fill="#25D48A" opacity="0.216243004" cx="30.0584472" cy="21.7657707" rx="9.95169733" ry="9.17325562"/>
                                    <g id="Group-4" transform="translate(16.959615, 6.479082)" fill="#54C796">
                                        <polygon id="Fill-6" points="10.7955395 21.7823628 0.11873799 11.3001058 4.25482787 7.73131106 11.0226557 14.3753897 27.414824 1.77635684e-15 31.3261391 3.77891399"/>
                                    </g>
                                    <path d="M4.82347935,67.4368303 L61.2182039,67.4368303 C62.3304205,67.4368303 63.2407243,66.5995595 63.2407243,65.5765753 L63.2407243,31.3865871 C63.2407243,30.3636029 62.3304205,29.5263321 61.2182039,29.5263321 L4.82347935,29.5263321 C3.71126278,29.5263321 2.80095891,30.3636029 2.80095891,31.3865871 L2.80095891,65.5765753 C2.80095891,66.5995595 3.71126278,67.4368303 4.82347935,67.4368303" id="Fill-8" fill="#59B08B"/>
                                    <path d="M33.3338063,67.4368303 L61.2181191,67.4368303 C62.3303356,67.4368303 63.2406395,66.5995595 63.2406395,65.5765753 L63.2406395,31.3865871 C63.2406395,30.3636029 62.3303356,29.5263321 61.2181191,29.5263321 L33.3338063,29.5263321 C32.2215897,29.5263321 31.3112859,30.3636029 31.3112859,31.3865871 L31.3112859,65.5765753 C31.3112859,66.5995595 32.2215897,67.4368303 33.3338063,67.4368303" id="Fill-10" fill="#4FC391"/>
                                    <path d="M29.4284029,33.2640869 C29.4284029,34.2202068 30.2712569,34.9954393 31.3107768,34.9954393 C32.3502968,34.9954393 33.1931508,34.2202068 33.1931508,33.2640869 C33.1931508,32.3079669 32.3502968,31.5327345 31.3107768,31.5327345 C30.2712569,31.5327345 29.4284029,32.3079669 29.4284029,33.2640869" id="Fill-15" fill="#FEFEFE"/>
                                    <path d="M8.45417501,71.5549073 L57.5876779,71.5549073 C60.6969637,71.5549073 63.2412334,69.2147627 63.2412334,66.3549328 L63.2412334,66.3549328 C63.2412334,63.4951029 60.6969637,61.1549584 57.5876779,61.1549584 L8.45417501,61.1549584 C5.34488919,61.1549584 2.80061956,63.4951029 2.80061956,66.3549328 L2.80061956,66.3549328 C2.80061956,69.2147627 5.34488919,71.5549073 8.45417501,71.5549073" id="Fill-12" fill="#5BD6A2"/>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <p>Karyawan Kembali</p>
                </a>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-6 p-3">
                <a href="<?php echo e(route('logbookBarangs.index')); ?>" class="cardz barangkeluar">
                    <div class="overlayz"></div>
                    <div class="circlez">

                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 464 464" xml:space="preserve" class=""><g transform="matrix(0.7,0,0,0.6999999999999998,69.60000000000002,29.60000000000005)">
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M232,464V264L48,200v200L232,464z" fill="#8b6fc0" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M232,144L48,200l184,64l184-64L232,144z" fill="#ac8be9" class=""/>
                                <path xmlns="http://www.w3.org/2000/svg" style="" d="M232,264v200l184-72V200" fill="#6a5297" class=""/>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path style="" d="M112,224v72l40,16v-72L112,224z" fill="#6a5297" class=""/>
                                    <path style="" d="M152,240l184-64l-48-16l-176,64" fill="#6a5297" class=""/>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <p>Barang keluar</p>
                </a>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-6 p-3">
            <a href="javascript:void(0)" class="cardz human-resources" onclick="modal_tamu()">
                    <div class="overlayz"></div>
                    <div class="circlez">
                        <svg width="66px" height="77px" viewBox="1855 26 66 77" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1855.000000, 26.000000)">
                                <path d="M4.28872448,42.7464904 C4.28872448,39.3309774 5.4159227,33.7621426 6.40576697,30.4912557 C10.5920767,32.1098991 14.3021264,35.1207513 18.69596,35.1207513 C30.993618,35.1207513 42.5761396,28.7162991 49.9992251,17.9014817 C56.8027248,23.8881252 60.8188351,33.0463165 60.8188351,42.7464904 C60.8188351,60.817447 47.6104607,76.6693426 32.5537798,76.6693426 C17.4970989,76.6693426 4.28872448,60.817447 4.28872448,42.7464904" id="Fill-8" fill="#AFCEFF"/>
                                <path d="M64.3368879,31.1832696 L62.8424171,46.6027478 L60.6432609,46.7824348 L59.8340669,34.6791304 L47.6573402,25.3339478 C44.2906753,34.068487 34.3459503,40.2903304 24.4684093,40.2903304 C17.7559812,40.2903304 10.046244,37.4168 5.80469412,32.8004522 L5.80469412,34.6791304 L5.80469412,46.6027478 L4.28932167,46.6027478 L1.30187314,27.8802435 C1.30187314,20.9790957 3.52342407,15.5432 7.27229127,11.3578087 C13.132229,4.79558261 21.8124018,0.0492173913 30.5672235,0.342852174 C37.4603019,0.569286957 42.6678084,2.72991304 50.8299179,0.342852174 C51.4629405,1.44434783 51.8615656,3.00455652 51.5868577,5.22507826 C51.4629405,6.88316522 51.2106273,7.52302609 50.8299179,8.45067826 C58.685967,14.1977391 64.3368879,20.7073739 64.3368879,31.1832696" id="Fill-10" fill="#3B6CB7"/>
                                <path d="M58.9405197,54.5582052 C62.0742801,54.8270052 65.3603242,52.60064 65.6350321,49.5386574 C65.772386,48.009127 65.2617876,46.5570226 64.3182257,45.4584487 C63.3761567,44.3613357 62.0205329,43.6162922 60.4529062,43.4818922 L58.9405197,54.5582052 Z" id="Fill-13" fill="#568ADC"/>
                                <path d="M6.32350389,54.675367 C3.18227865,54.8492104 0.484467804,52.4957496 0.306803449,49.4264626 C0.217224782,47.8925496 0.775598471,46.4579757 1.75200594,45.3886191 C2.7284134,44.3192626 4.10792487,43.6165843 5.67853749,43.530393 L6.32350389,54.675367 Z" id="Fill-15" fill="#568ADC"/>
                            </g>
                        </svg>
                    </div>
                    <p>Tamu</p>
                </a>
            </div>

            <div class="col-lg-3 col-sm-6 col-xs-6 p-3">
            <a href="<?php echo e(route('logbooks.index')); ?>" class="cardz kuning">
                    <div class="overlayz"></div>
                    <div class="circlez">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(0.5499999999999999,0,0,0.5499999999999999,115.20000000000002,130.20024719238282)"><g xmlns="http://www.w3.org/2000/svg"><g><path d="m117.42 0c-25.602 0-46.82 20.755-46.82 46.358l6.287 330.717 381.962-30.105v-326.366c0-11.379-9.225-20.604-20.604-20.604z" fill="#fff458" data-original="#ff8086" style="" class=""/></g><g><g><g><path d="m76.877 46.358c0-25.603 20.755-46.358 46.358-46.358h-23.726c-25.602 0-46.358 20.755-46.358 46.358v341.922l10.429 14.528 3.06 3.472 10.237-58.954z" fill="#ffd73c" data-original="#f46c7a" style="" class=""/></g></g></g><g><path d="m437.519 443.575-9.187-35.577 9.187-30.503h16.179c2.845 0 5.151-2.306 5.151-5.151v-25.754c0-2.845-2.306-5.151-5.151-5.151h-354.189c-8.217 0-15.935 2.138-22.628 5.888-14.16 7.934-5.081 23.084-5.081 40.47v45.477c0 25.603 18.677 46.358 44.28 46.358h39.796l46.484-14.311 44.007 14.311h207.33c2.845 0 5.151-2.306 5.151-5.151v-25.755c0-2.845-2.306-5.151-5.151-5.151z" fill="#ffe300" data-original="#db4655" style="" class=""/></g><g><path d="m76.887 433.273v-85.937c-14.16 7.934-23.735 23.075-23.735 40.461v45.477c0 25.603 20.755 46.358 46.358 46.358h23.735c-25.603-.001-46.358-20.756-46.358-46.359z" fill="#e1ba1e" data-original="#ce344a" style="" class=""/></g><g><path d="m102.64 433.575v-46.08c0-5.523 7.077-10 12.6-10h322.279v66.08h-321.919c-5.523 0-12.96-4.477-12.96-10z" fill="#f4feff" data-original="#eef5f6" style="" class=""/></g><g><path d="m109.482 433.273v-45.477c0-5.681 4.621-10.302 10.302-10.302h-20.274c-5.681 0-10.302 4.621-10.302 10.302v45.477c0 5.681 4.621 10.302 10.302 10.302h20.274c-5.681 0-10.302-4.621-10.302-10.302z" fill="#deecf1" data-original="#deecf1" style="" class=""/></g><g><path d="m246.367 410.535v96.305c0 4.386-5.133 6.766-8.48 3.931l-34.075-28.86c-1.553-1.315-3.829-1.315-5.381 0l-21.786 18.452-6.144 2.189c-3.347 2.835-8.48.456-8.48-3.931l14.624-88.085h69.722z" fill="#c3ddff" data-original="#c3ddff" style="" class=""/></g><g><path d="m176.645 410.535h-20.768v96.304c0 4.386 5.133 6.765 8.48 3.931l12.289-10.408v-89.827z" fill="#a4ccff" data-original="#a4ccff" style="" class=""/></g><path d="m437.518 402.808h-49.12c-4.268 0-7.726 3.459-7.726 7.726s3.459 7.726 7.726 7.726h49.12z" fill="#a7c7d3" data-original="#a7c7d3" style="" class=""/><g><path d="m350.571 418.261h-229.512c-4.268 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h229.512c4.268 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#a7c7d3" data-original="#a7c7d3" style="" class=""/></g><g><path d="m367.134 178.654h-202.454c-5.523 0-12.56-4.477-12.56-10v-91.672c0-5.523 8.091-10 13.614-10h201.4c5.523 0 10 4.477 10 10v91.672c0 5.523-4.477 10-10 10z" fill="#f4feff" data-original="#ffc0c6" style="" class=""/></g><g><path d="m159.071 168.352v-91.068c0-5.69 4.612-10.302 10.302-10.302h-24.205c-5.69 0-10.302 4.612-10.302 10.302v91.068c0 5.69 4.612 10.302 10.302 10.302h24.205c-5.689 0-10.302-4.612-10.302-10.302z" fill="#d7ebed" data-original="#f9acb7" style="" class=""/></g><g><path d="m319.047 111.218h-126.094c-4.268 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h126.094c4.268 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ffe300" data-original="#db4655" style="" class=""/></g><g><path d="m319.047 149.871h-126.094c-4.268 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h126.094c4.268 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#ffe300" data-original="#db4655" style="" class=""/></g><g><path d="m375.159 223.467h-238.319c-4.268 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h238.319c4.268 0 7.726 3.459 7.726 7.726.001 4.267-3.458 7.726-7.726 7.726z" fill="#ffe300" data-original="#db4655" style="" class=""/></g></g></g></svg>

                    </div>
                    <p>Logbook</p>
                </a>
            </div>

        </div>
    </div>

    <audio id="beep">
        <source src="beep.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <?php echo $__env->make('security.modal_keluar', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('security.modal_kembali', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('security.modal_tamu', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_scripts'); ?>
    <script>

        function modal_keluar() {
            $('#modal-keluar').modal('show');
        }

        function modal_kembali() {
            $('#modal-kembali').modal('show');
        }

        function modal_tamu() {
            $('#modal-tamu').modal('show');
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jrmrequest\resources\views/security/index.blade.php ENDPATH**/ ?>
