
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JSSATE-B | Login</title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">
                @include('layouts.partials.alerts')
                <form action="{{ route('login')}}" method="post">
                <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                    <input type="text" name="email" class="form-control" placeholder="Email ID" >
                    <span class="help-block m-b-none text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" >
                    <span class="help-block m-b-none text-danger">{{ $errors->first('password') }}</span>

                </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#">
                    <small>Forgot password?</small>
                </a>
                {{ csrf_field() }}
                </form>
                <p class="m-t">
                    <small>Productivity Manager.</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6 text-right">
            <small>©2017</small>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
