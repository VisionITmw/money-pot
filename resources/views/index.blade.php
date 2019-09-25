<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Money Pot</title>

    <link rel="favicon" href="{{asset('img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('vendor/metro-css/css/metro-all.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/roboto300.css')}}">

</head>
<body class="">
<div class="container" id="login-container">

    <div class="card win-shadow" id="login-card">
        <div class="card-content p-2">
            <form action="{{route('login')}}" class="p-6 mx-auto bd-default" method="POST">
                @csrf
                <div class="place-right" style="margin-top:-10px">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </div>
                <h4 class="text-light">
                    Login to money-pot
                </h4>
                <hr class="thin mt-4 mb-4 bg-white">
                <div class="form-group">
                    <input type="text" class="{{$errors->has('username') ? 'invalid' : ''}}" value="{{old('username')}}" name="username" data-role="input"
                           data-prepend="<span class='mif-user'>"
                           placeholder="username">
                    @if($errors->has('username'))
                        <p class="invalid_feedback">
                            {{$errors->first('username')}}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="{{$errors->has('password') ? 'invalid' : ''}}" name="password"
                           data-role="input" data-prepend="<span class='mif-key'>" placeholder="password">
                    @if($errors->has('password'))
                        <p class="invalid_feedback">
                            {{$errors->first('password')}}
                        </p>
                    @endif
                </div>
                <div class="form-group mt-4">
                    <input type="checkbox" data-role="checkbox" data-caption="Remember me" class="place-right">
                    <button class="button primary">Sign In</button>
                </div>
            </form>
        </div>
        <div class="card-footer fg-red ">
            <div class="pos-center">
                <small>&copy; money-pot /nkhenge-loans &middot; 2019</small>
            </div>
        </div>
    </div>
</div><!-- ./ login -->

</div>
<script src="{{asset('vendor/metro-css/js/metro.js')}}"></script>
</body>
</html>
