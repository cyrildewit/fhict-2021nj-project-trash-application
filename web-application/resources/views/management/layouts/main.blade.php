<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title') - Beheersysteem Project TRASH</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{ asset('management/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('management/css/sb-admin-2.min.css') }}" rel="stylesheet">

    @include('management.partials.custom-css')

    @stack('head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('management.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('management.partials.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('management.partials.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Weet u zeker dat u wil uitloggen?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Sluiten">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">Selecteer hieronder "Uitloggen" als u uw huidige sessie wil beëindigen.</div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                    <form action="{{ route('management.auth.logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">Uitloggen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @stack('below_content')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('management/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('management/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('management/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('management/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('management/vendor/chart.js/Chart.min.js') }}"></script>

    @stack('footer')

    {{-- <!-- Page level custom scripts -->
    <script src="{{ asset('management/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('management/js/demo/chart-pie-demo.js') }}"></script> --}}

</body>

</html>
