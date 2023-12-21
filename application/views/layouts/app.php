<!DOCTYPE html>
<html lang="en">

<?php if ($this->session->userdata('role') == 'admin') : ?>

    <head>
        <meta charset="utf-8">
        <title><?= isset($title) ? $title : 'CIShop' ?> - Moer's Snack</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <!-- <link href="img/favicon.ico" rel="icon"> -->
        <!-- SimpleLightbox plugin CSS -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" /> -->

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/assets/css/admin-bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/assets/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" />

        <!-- Library DataTables -->
        <!-- <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css"> -->
        <!-- datatable style -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <!-- bootstrap 4 css  -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
        <!-- css tambahan  -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

        <!-- tambahan untuk filter -->
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    </head>

    <style>
        .label {
            display: inline-block;
            padding: 0.2em 0.6em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25em;
        }

        .label-primary {
            background-color: #007bff;
            color: #fff;
        }

        .label-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .label-success {
            background-color: #28a745;
            color: #fff;
        }

        .label-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .label-warning {
            background-color: #ffc107;
            color: #fff;
        }
    </style>
    </head>

    <body>
        <div class="container-xxl position-relative bg-white d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->

            <!-- Sidebar Start-->
            <?php $this->load->view('layouts/_sidebar'); ?>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="content">

                <!-- Navbar -->
                <?php $this->load->view('layouts/_navbar'); ?>
                <!-- End Navbar -->

                <?php $this->load->view($page); ?>

                <!-- Footer Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light rounded-top p-4">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="<?= base_url('pageadmin') ?>">Moer's Sanck</a>, All Right Reserved.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="lib/chart/chart.min.js"></script> -->
        <script src="/assets/lib/easing/easing.min.js"></script>
        <script src="/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/moment.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="/assets/lib/wow/wow.min.js"></script>

        <!-- Template Javascript -->
        <script src="/assets/js/main.js"></script>

        <!-- Librarry DataTables -->
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
        <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script> -->
        <!-- <script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script> -->

        <!-- jquery datatable -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

        <!-- script tambahan  -->
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

        <!-- tambahan untuk filter -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <!-- untuk chart -->

    </body>



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
    <!-- SimpleLightbox plugin JS-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script> -->


    <script>
        // $(document).ready(function() {
        // Inisialisasi DataTables
        // var table = $('#dynamic-table').DataTable({
        // "dom": "lBftrip",
        // lengthChange: true, // Aktifkan opsi untuk mengubah jumlah tampilan data per halaman
        // searching: true,
        // Aktifkan fitur pencarian pada tabel
        // buttons: [ // Tambahkan tombol ekspor ke PDF dan Excel
        // {
        // extend: 'excel',
        // text: 'Export to Excel',
        // className: 'btn btn-success',
        // },
        // {
        // extend: 'pdf',
        // text: 'Export to PDF',
        // className: 'btn btn-danger',
        // }
        // ]
        // });

        // Tambahkan tombol ekspor ke dalam DOM
        // table.buttons().container().appendTo('#dynamic-table_wrapper .col-md-6:eq(0)');


        // });

        $(document).ready(function() {

            $('#table_id').DataTable({
                // script untuk membuat export data 
                dom: '<"row mb-2"<"col-md-12"f><"col-md-12"l><"col-md-12 d-flex justify-content-end"B>><"table-responsive"t><"row mt-2"<"col-md-12"i><"col-md-12"p>>',
                lengthChange: true,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5', '10', '25', '50', 'Show all']
                ],
                select: true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "bDestroy": true
            });

        });

        function createSlug() {
            let title = $('#title').val();
            $('#slug').val(string_to_slug(title));
        }

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    </script>
    </body>

<?php else : ?>

    <head>
        <meta charset="utf-8">
        <title><?= isset($title) ? $title : 'CIShop' ?> - Moer's Snack</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <!-- <link href="/assets/img/favicon.ico" rel="icon"> -->

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Libraries Stylesheet -->
        <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/assets/css/style.css" rel="stylesheet">

        <style>
            .label {
                display: inline-block;
                padding: 0.2em 0.6em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25em;
            }

            .label-primary {
                background-color: #007bff;
                color: #fff;
            }

            .label-secondary {
                background-color: #6c757d;
                color: #fff;
            }

            .label-success {
                background-color: #28a745;
                color: #fff;
            }

            .label-danger {
                background-color: #dc3545;
                color: #fff;
            }

            .label-warning {
                background-color: #ffc107;
                color: #fff;
            }
        </style>
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Content -->
        <?php $this->load->view($page); ?>
        <!-- End Content -->

        <!-- Navbar -->
        <?php $this->load->view('layouts/_navbar'); ?>
        <!-- End Navbar -->

        <!-- Footer Start -->

        </style>

        <!-- Footer -->
        <div class="container-fluid footer pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="<?= base_url('home') ?>">Moer's Snack</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/lib/wow/wow.min.js"></script>
        <script src="/assets/lib/easing/easing.min.js"></script>
        <script src="/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="/assets/js/main.js"></script>

    </body>

<?php endif ?>

</html>