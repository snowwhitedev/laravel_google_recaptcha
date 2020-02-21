<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PayPal CSV Converter by ThePortlandCompany.com">
    <meta name="author" content="Ahmed Maher Halima">

    <link rel="shortcut icon" href="{{ asset('myadmin/assets/images/favicon.ico') }}">

    <title>PayPal CSV Converter by ThePortlandCompany.com</title>

    <!-- App css -->
    <link href="{{ asset('myadmin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('myadmin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('myadmin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('myadmin/assets/js/modernizr.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @yield('styles')

</head>

<body  class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('dashboard') }}" class="logo"><img src="{{ asset('logo-transparent.png') }}" alt="PayPal CSV Converter by ThePortlandCompany.com" style="height: 35px;"><i class="mdi mdi-layers"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">

                <!-- Page title -->
                <ul class="nav navbar-nav list-inline navbar-left">
                    <li class="list-inline-item">
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="page-title">@yield('title')</h4>
                    </li>
                </ul>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    @include('admin.layout.sidebar')



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            This application was developed by <a href="https://theportlandcompany.com" target="_blank">The Portland Company - a Portland, Oregon based digital marketing agency.</a>
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<style>
    #sidebar-menu > ul > li > a.activemenu {
        border-left: 3px solid #71b6f9 !important;
    }
</style>

<!-- jQuery  -->
<script src="{{ asset('myadmin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/detect.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/waves.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('myadmin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

<!-- App js -->
<script src="{{ asset('myadmin/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.app.js') }}"></script>
@yield('scripts')
</body>
</html>