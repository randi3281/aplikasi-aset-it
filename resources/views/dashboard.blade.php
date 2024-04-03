<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adira IT Assets Management</title>
    <link rel="stylesheet" href="{{ asset('bt/css/bootstrap.css') }}">
</head>

@if (
    $menu == 'dashboard' ||
        $menu == 'user_manajemen' ||
        $menu == 'mutasi' ||
        $menu == 'penghapusan' ||
        $menu == 'export_to_excel')

    <body class="bg-warning">
    @elseif ($menu == 'data_barang')

        <body class="bg-warning" style="width: 2100px">
@endif
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
        @if (
            $menu == 'dashboard' ||
                $menu == 'user_manajemen' ||
                $menu == 'mutasi' ||
                $menu == 'penghapusan' ||
                $menu == 'export_to_excel')
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
            @elseif ($menu == 'data_barang')
                <div class="col-md-12" style="margin-left: 230px">
        @endif

        @if ($posisi == 'admin')
            @if ($menu == 'dashboard')
                @php
                    $_SESSION['edit'] = 'tidak';
                @endphp
                @include('dashboard.admin.dashboard')
            @elseif ($menu == 'user_manajemen')
                @include('dashboard.admin.user_manajemen')
            @elseif ($menu == 'data_barang')
                @include('dashboard.admin.data_barang')
            @elseif ($menu == 'mutasi')
                @include('dashboard.admin.mutasi')
            @elseif ($menu == 'penghapusan')
                @include('dashboard.admin.penghapusan')
            @elseif ($menu == 'export_to_excel')
                @include('dashboard.admin.export_to_excel')
            @endif
        @elseif ($posisi == 'pengguna')
            @if ($menu == 'dashboard')
                @include('dashboard.pengguna.dashboard')
            @elseif ($menu == 'data_barang')
                @include('dashboard.pengguna.data_barang')
            @elseif ($menu == 'mutasi')
                @include('dashboard.pengguna.mutasi')
            @elseif ($menu == 'penghapusan')
                @include('dashboard.pengguna.penghapusan')
            @elseif ($menu == 'export_to_excel')
                @include('dashboard.pengguna.export_to_excel')
            @endif
        @endif
    </div>
</div>
</div>
</body>

</html>
