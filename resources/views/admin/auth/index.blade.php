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

</head>

<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="{{ route('login') }}" class="logo"><img src="{{ asset('logo-transparent.png') }}" alt="PayPal CSV Converter by ThePortlandCompany.com" style="height: 70px;"></a>
        <h5 class="text-muted m-t-0 font-600">by ThePortlandCompany.com</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
        </div>
        <div class="p-20">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" required="" placeholder="Email Address">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    </div>
                </div>


                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
    <!-- end card-box-->


</div>
<!-- end wrapper page -->



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

<!-- App js -->
<script src="{{ asset('myadmin/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('myadmin/assets/js/jquery.app.js') }}"></script>

</body>
</html>