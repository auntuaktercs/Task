<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - BRT- ICMS</title>
        <link href="{{ asset('/') }}images/1519532356.png" rel="icon">
        <!-- GLOBAL MAINLY STYLES-->
        <link href="{{ asset('/') }}backend/user/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="{{ asset('/') }}backend/user/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="{{ asset('/') }}backend/user/vendors/themify-icons/css/themify-icons.css" rel="stylesheet"/>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <!-- PLUGINS STYLES-->
        <link href="{{ asset('/') }}backend/user/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
        <link href="{{ asset('/') }}backend/user/vendors/DataTables/datatables.min.css" rel="stylesheet"/>
        <!-- THEME STYLES-->
        <link href="{{ asset('/') }}backend/user/css/main.css" rel="stylesheet"/>
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <!-- Select2 CDN-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
        <!-- PAGE LEVEL STYLES-->

        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet" />

        <!-- Font Awesome 5 CDN-->
        <script src="https://kit.fontawesome.com/5303eef768.js" crossorigin="anonymous"></script>
        <!-- Font Awesome 5 CDN-->
    </head>

    <body class="fixed-navbar">
        <div class="page-wrapper">
            @include('backend.partials.topbar')
            @include('backend.partials.sidebar')


            <div class="content-wrapper">
                @yield('content')
            </div>
        @include('backend.partials.footer')

        <!-- CORE PLUGINS-->
        <script src="{{asset('/')}}backend/user/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{asset('/')}}backend/user/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/jquery-slimscroll/jquery.slimscroll.min.js"
                type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->
        <script src="{{asset('/')}}backend/user/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js"
                type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"
                type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/jvectormap/jquery-jvectormap-us-aea-en.js"
                type="text/javascript"></script>
        <script src="{{asset('/')}}backend/user/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
        <!-- Custom JS -->
        <script src="{{ asset('backend/js/script.js') }}"></script>
        <!-- CORE SCRIPTS-->
        <script src="{{asset('/')}}backend/user/js/app.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS-->
        <script src="{{asset('/')}}backend/user/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

        <script src="https://cdn.tiny.cloud/1/6d60co0ye77h7jzv1r3d7ku4n6gpkr59pv0y2dhe7aeh6r2i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script>

            tinymce.init({
                selector: 'textarea'
            });

            $(document).ready(function () {
                $('.select2').select2();
            });

            $(function () {
                $('#example-table').DataTable({
                    pageLength: 10,
                    "scrollX": true,
                    //"ajax": './assets/demo/data/table_data.json',
                    "dom": "Bfrtip",
                    // //column visibility
                    "buttons": [
                        {
                            extend: 'colvis',
                            collectionLayout: 'fixed two-column'
                            // columns: ':not(.permanent)'
                        },
                        {
                            extend: 'print',
                            footer: true,
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        // {
                        //     extend: 'pdfHtml5',
                        //     footer: true,
                        //     orientation: 'landscape',
                        //     pageSize: 'A4'
                        // },
                        {
                            extend: 'excelHtml5',
                            footer: true,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        // {
                        //     extend: 'csvHtml5',
                        //     footer: true,
                        //     exportOptions: {
                        //         columns: ':visible'
                        //     }
                        // }
                    ],
                    'language': {
                        'buttons': {
                            colvis: 'Column Visibility',
                            print: 'Print',
                            excel: 'Excel Export',
                            //

                        }
                    }
                });
            })
        </script>

    @yield('footer_script')
    @stack('script')
    </body>

    {{-- data table search box style start--}}
    <style>
        .dataTables_wrapper .dataTables_filter input{
            background-color:#eee;
            padding: 2px;
            font-size: 16px;
            border-color: #2e39bf;
        }
    </style>
    {{-- data table search box style end--}}
</html>
