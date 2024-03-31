<li class="nav-item">
    <a href="{{ route('dashboard', ['menu' => 'dashboard']) }}" class="nav-link text-white">
        @if ($menu == 'dashboard')
            <b><i>Dashboard</i></b>
        @else
            Dashboard
        @endif
    </a>
</li>
@if ($posisi == 'admin')
    <li class="nav-item">
        <a href="{{ route('dashboard', ['menu' => 'user_manajemen']) }}" class="nav-link text-white">
            @if ($menu == 'user_manajemen')
                <b><i>Manajemen User</i></b>
            @else
                Manajemen User
            @endif
        </a>
    </li>
@endif
<li class="nav-item">
    <a href="{{ route('dashboard', ['menu' => 'data_barang']) }}" class="nav-link text-white">
        @if ($menu == 'data_barang')
            <b><i>Data Barang</i></b>
       @else
            Data Barang
        @endif
    </a>
</li>
{{-- <li class="nav-item">
    <a href="{{ route('mutasi') }}" class="nav-link text-white">Mutasi</a>
</li>
<li class="nav-item">
    <a href="{{ route('penghapusan') }}" class
    ="nav-link text-white">Penghapusan</a>
</li>
<li class="nav-item">
    <a href="{{ route('exporttoexcel') }}" class="nav-link text-white">Export to Excel</a>
</li> --}}
<li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
</li>
