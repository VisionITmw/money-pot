<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')

    @yield('title')

    <link rel="favicon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('vendor/metro-css/css/metro-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/roboto300.css')}}">

    @yield('stylesheets')

</head>
<body class=" h-vh-100">
<div data-role="navview" data-expand="false">
    <div class="navview-pane bg-grayBlue fg-white">
        @include('partials.nav')
    </div>
    <div class="navview-content ">
        <div data-role="appbar" class="appbar" data-expand-point="md">
            <a href="#" class="brand no-hover">
                <img src="{{asset('img/logo.png')}}" alt="logo-img" class="img-logo"> <strong>Money Pot</strong> /
                Nkhenge Loans
            </a>
        </div>
        @yield('content')
        <div class="container-fluid">
            <hr>
            <small>&copy; <a href="https://github.com/visionitmw">VisionIT</a> </small>
        </div>
    </div>
</div>

<script src="{{asset('vendor/metro-css/js/metro.js')}}"></script>
<script>
    $(function () {
        var notify = Metro.notify;
        notify.setup({
            width: 300,
            duration: 1000,
            animation: 'easeOutBounce'
        });
        @if(session()->has('success-notification'))
        notify.create("{{session('success-notification')}}", "Success", {cls: "success"});
        @elseif(session()->has('error-notification'))
        notify.create("{{session('error-notification')}}", "Alert", {cls: "alert"})
        @endif
    })
</script>
@yield('scripts')
</body>
</html>

