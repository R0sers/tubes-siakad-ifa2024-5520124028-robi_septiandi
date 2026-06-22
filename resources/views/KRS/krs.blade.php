@extends('layout.template')

@section('content')
    <div class="container mt-4">

        <h2 class="mb-3">Data KRS</h2>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card p-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('form-krs') }}" class="btn btn-primary btn-sm">Tambah Data</a>

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
                        <th>NO</th>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKRS as $krs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $krs->npm }}</td>
                            <td>{{ $krs->mahasiswa?->nama ?? '--' }}</td>
                            <td>
                                <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                                <a href="{{ route('form-edit-krs', $krs->id) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i>Edit</a>
                                <a href="{{ route('detail-krs', ['id' => $krs->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataKRS->links() }}
        </div>
    </div>
    </div>
@endsection