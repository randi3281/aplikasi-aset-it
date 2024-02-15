<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bt/css/bootstrap.css') }}">
</head>

<body class="bg-warning">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Aplikasi Inventaris Aset IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group mt-3 text-center">
                                <button type="submit" class="btn btn-dark btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
