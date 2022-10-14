<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>laravel_project_seven</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('theme/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('theme/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.png') }}" />

    <script src="{{ asset('theme/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/bootstrap.min.js') }}"></script>

    <script src="{{ asset('theme/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/additional-methods.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style>
        h3.ab {
            background-color: #4B49AC;
            padding: 15px;
            color: aliceblue;
        }

        a.ab {
            color: aliceblue;
            text-align: center;
        }

        .ab {
            margin-top: 10px;



        }

        ul.ab {
            display: flex;
            list-style: none;
        }

        li.ab {
            margin-right: 6px;
        }

        i.mdi.mdi-record {
            height: -53px;
            font-size: 8px;
            margin-left: 4px;
        }

        .abc {
            margin-left: 294px;
            margin-top: 37px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin::adminpannel.common.header')
        <!-- partial -->


        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        @yield('content')

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">2022 © Developed By
                        Siddhi Vaghasiya
                    </span>

                </div>

            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    @include('admin::adminpannel.common.footer')

</body>

</html>
