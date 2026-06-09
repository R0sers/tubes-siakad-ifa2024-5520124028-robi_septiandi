@extends('layout.template')

@section('content')

<div class="container mt-4">

    <h2 class="mb-3">Data Dosen</h2>

     @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card p-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('form-dosen') }}" class="btn btn-primary btn-sm">Tambah Data</a>

                <form class="d-flex align-items-center gap-2">
                    <div class="input-group input-group-sm" width="250px">
                        <input name="search" type="text" class="form-control" placeholder="Cari data">
                        <button class="btn btn-sm btn-success" type="submit">Cari</button>
                    </div>
                </form>

            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDosen as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>

                        <td>
                            <form action="{{ route('dosen.destroy', $dosen->nidn) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('form-edit-dosen', $dosen->nidn) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i>Edit</a>
                            <a href="{{ route('detail-dosen', ['id' => $dosen->nidn]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         {{ $dataDosen->links() }}
        </div>
    </div>
</div>
@endsection
