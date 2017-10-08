<html>
    <head>
        <title>Stuff-Dashboard</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
    <div class="jumbotron">
        <h1>Stuff Loged In</h1>
        <p></p>
        <p><a class="btn btn-primary btn-lg" href="{{route('stufflogout')}}" role="button">Logout</a></p>
        <p><a class="btn btn-primary btn-lg" href="{{action('StuffController@edit', $st['id'])}}" role="button">Edit</a></p>
    </div>
    </body>
</html>