<div class="row mt-5 justify-content-end">
    <div class="col-md-12">
        <form action="{{ Route('proses.data_barang_pilihan') }}"></form>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Perolehan</th>
                    <th>Asset</th>
                    <th>Kode Fa Fams</th>
                    <th>Nama Barang</th>
                    <th>Outlet Pencatatan</th>
                    <th>Outlet Actual</th>
                    <th>Type Barang</th>
                    <th>Location</th>
                    <th>Jabatan</th>
                    <th>Nama User</th>
                    <th>NIK</th>
                    <th>Komputer Nama</th>
                    <th>IP Address</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Serial Number</th>
                    <th>Sophos</th>
                    <th>Landesk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datanya as $user)
                    <tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $datanya->links('pagination::bootstrap-4') }}
    </div>
</div>
