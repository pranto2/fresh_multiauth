<html>
<head>
    <title>Stuff-Edit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Stuff-Edit</h1>
            <div class="account-wall">
                <form class="form-signin" method="post" action="{{route('updatepassword')}}">
                    {{ csrf_field() }}
                    {{--<input type="text" class="form-control" value="{{$stuff->username}}" required autofocus>--}}
                    Old-Password:<input type="password" class="form-control" name="current-password" required>
                    Enter-New Password:<input type="password" class="form-control" name="password" required>
                    Confirm-Password:<input type="password" class="form-control" name="password_confirmation" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                </form>
                @if ($errors->has('currentpass'))
                    <span class="help-block">
                        <strong>{{ $errors->first('massage') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>