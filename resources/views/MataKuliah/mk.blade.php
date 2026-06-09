@extends('layout.template')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Mata Kuliah</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card p-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('form-matkul') }}" class="btn btn-primary btn-sm">Tambah Data</a>

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
                        <th>Kode Matakuliah</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMatkul as $matkul)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $matkul->kode_matakuliah }}</td>
                        <td>{{ $matkul->nama_matakuliah }}</td>
                        <td>{{ $matkul->sks }}</td>
                        <td>
                            <form action="{{ route('matkul.destroy', $matkul->kode_matakuliah) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                            <a href="{{ route('form-matkul', $matkul->kode_matakuliah) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i>Edit</a>
                            <a href="{{ route('detail-matkul', ['id' => $matkul->kode_matakuliah]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataMatkul->links() }}
        </div>
    </div>
</div>
@endsection
