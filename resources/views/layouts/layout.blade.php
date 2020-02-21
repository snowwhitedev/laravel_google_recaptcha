
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'PayPal CSV Converter by ThePortlandCompany.com')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-52CHWRX');</script>
    <!-- End Google Tag Manager -->

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52CHWRX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
    <div class="container"><a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logo-transparent.png') }}" alt="PayPal CSV Converter by ThePortlandCompany.com" style="height: 45px;">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav" style="width: 75%;">
                <li class="nav-item" role="presentation"><a class="nav-link " href="{{ url('/') }}">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link " href="{{ url('/blog') }}">Blog</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link " href="{{ route('contact') }}">Contact & Feedback</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
            </ul>

            <nav class="navbar navbar-light justify-content-between">
                <a class="btn btn-light text-right float-right action-button" role="button" href="#"><i class="fa fa-user"></i>&nbsp;Member Login</a>
            </nav>
        </div>

    </div>
</nav>
@yield('content')
<footer class="footer">
    <div class="container">
        <p class="text-muted text-center" style="margin-top: 20px">This application was developed by <a href="https://theportlandcompany.com" target="_blank">The Portland Company - a Portland, Oregon based digital marketing agency.</a></p>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
