<div class="row">
    <div class="col-md-4">
        <div class="card mt-5">
            <div class="card-header bg-dark text-white">
                <h5 class="text-center">Tambah User</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{-- <form action="{{ route('admin.user.store') }}" method="post"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="nik">NIK</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="nik">Posisi</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="nik">Area</label>
                        <input type="text" name="nik" id="nik" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3 w-100">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mt-5">
            <h4 class="text-center mt-4">Manajemen User</h4>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Posisi</th>
                            <th>Area</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_manajemen as $user)
                            <tr>
                                <td style="height: 8px; font-size: 11pt">{{ $loop->iteration }}</td>
                                <td style="height: 8px; font-size: 11pt">{{ $user->nama }}</td>
                                <td style="height: 8px; font-size: 11pt">{{ $user->nik }}</td>
                                <td style="height: 8px; font-size: 11pt">{{ $user->posisi }}</td>
                                <td style="height: 8px; font-size: 11pt">{{ $user->area }}</td>
                                {{-- <td> --}}
                                {{-- <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">Edit</a> --}}
                                {{-- <form action="{{ route('admin.user.delete', $user->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
