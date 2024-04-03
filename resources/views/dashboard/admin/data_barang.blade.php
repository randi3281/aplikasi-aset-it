<div class="row mt-5 justify-content-end">
    <div class="col-md-12">
        <form class="mb-4" action="{{ Route('proses.data_barang_pilihan') }}" method="POST">
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
                    <option value="01" name="01">Januari</option>
                    <option value="02" name="02">Februari</option>
                    <option value="03" name="03">Maret</option>
                    <option value="04" name="04">April</option>
                    <option value="05" name="05">Mei</option>
                    <option value="06" name="06">Juni</option>
                    <option value="07" name="07">Juli</option>
                    <option value="08" name="08">Agustus</option>
                    <option value="09" name="09">September</option>
                    <option value="10" name="10">Oktober</option>
                    <option value="11" name="11">November</option>
                    <option value="12" name="12">Desember</option>
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
