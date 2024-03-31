<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bt/css/bootstrap.css') }}">
</head>

<body class="bg-warning">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark position-fixed" style="height: 700px">
                <ul class="nav flex-column">
                    <li class="nav-item text-center">
                        <img src="{{ asset('images/logo.png') }}" alt="" class="w-75 mt-5 mb-5">
                    </li>
                    @include('dashboard.navbar')
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-10">
                @if ($posisi == 'admin')
                    @if ($menu == 'dashboard')
                        @include('dashboard.admin.dashboard')
                    @elseif ($menu == 'usermanajemen')
                        @include('dashboard.admin.user_manajemen')
                    @endif
                @elseif ($posisi == 'pengguna')
                    @if ($menu == 'dashboard')
                        @include('dashboard.pengguna.dashboard')
                    @endif
                @endif
            </div>
        </div>
    </div>
</body>

</html>
