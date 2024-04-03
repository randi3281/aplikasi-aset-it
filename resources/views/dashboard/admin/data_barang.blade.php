<div class="row mt-5 justify-content-end">
    <div class="col-md-12">
        <h1 class="mb-4"><b>Data Barang</b></h1>
        <form class="mb-3" action="{{ Route('proses.data_barang_pilihan') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="area"><b>Pilih Area : </b></label>
                <select class="form-control-sm" id="area" name="area">
                    <option value="all">All</option>
                    @foreach ($data_user as $item)
                        <option value="{{ $item->area }}" name="{{ $item->area }}">{{ $item->area }}
                        </option>
                    @endforeach
                </select>
                <label for="bulan" class="ms-2"><b>Bulan : </b></label>
                <select class="form-control-sm" id="bulan" name="bulan">
                    <option value="all">All</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                <label for="bulan" class="ms-2"><b>Tahun : </b></label>
                <select class="form-control-sm" id="tahun" name="tahun">
                    <option value="all">All</option>
                    <option value="2023" name="2023">2023</option>
                    <option value="2024" name="2024">2024</option>
                </select>
                <button type="submit" class="btn btn-primary btn ms-3"><b>Submit</b></button>
            </div>
        </form>
        <p style="font-size: 14px" class="mb-4"> <b>Keterangan : <i></b>Area : {{ $_SESSION['data_barang_area'] }},
            Bulan :
            {{ $_SESSION['data_barang_bulan'] }}, Tahun
            :
            {{ $_SESSION['data_barang_tahun'] }}</i></p>

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
                @foreach ($datanya as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->tanggal_perolehan }}</td>
                        <td>{{ $data->asset }}</td>
                        <td>{{ $data->kode_fa_fams }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->outlet_pencatatan }}</td>
                        <td>{{ $data->outlet_actual }}</td>
                        <td>{{ $data->type_barang }}</td>
                        <td>{{ $data->location }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->nama_user }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->komputer_nama }}</td>
                        <td>{{ $data->ip_address }}</td>
                        <td>{{ $data->kondisi }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->serial_number }}</td>
                        <td>{{ $data->sophos }}</td>
                        <td>{{ $data->landesk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $datanya->links('pagination::bootstrap-4') }}
    </div>
</div>
