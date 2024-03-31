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
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white"><b><i>Dashboard</i></b></a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Data Barang</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Mutasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class
                        ="nav-link text-white">Penghapusan</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">Export to Excel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-10">
                @if ($posisi == 'admin')
                    @include('dashboard.admin')
                @elseif ($posisi == 'pengguna')
                    @include('dashboard.pengguna')
                @endif
            </div>
        </div>
    </div>
</body>

</html>
