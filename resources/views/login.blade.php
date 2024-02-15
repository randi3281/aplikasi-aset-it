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
            {{-- buatlah jika error dalam validation --}}
            @if ($errors->any())
                <div class="col-md-5">
                    <div class="card mt-4">
                        <div class="card-header bg-dark text-white text-center">
                            <h4>Aplikasi Inventaris Aset IT</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <div class="col-md-5 mt-5">
                                <div class="card mt-4">
                                    <div class="card-header bg-dark text-white text-center">
                                        <h4>Aplikasi Inventaris Aset IT</h4>
                                    </div>
                                    <div class="card-body">
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="form-group mt-3">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" required autofocus
                                placeholder="Masukkan NIK Anda">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                placeholder="Masukkan password Anda">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5 mb-4 text-center">
                    <button type="submit" class="btn btn-dark btn-block w-25">Login</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>
