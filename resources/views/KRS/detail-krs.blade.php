@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail KRS</h1>

        <div class="card">
            <div class="card-header">
                <strong>{{ $dataMahasiswa->nama }}</strong> — NPM: {{ $dataMahasiswa->npm }}
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            @if(Auth::user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKRS as $krs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $krs->jadwal?->matakuliah?->nama_matakuliah ?? '-' }}</td>
                                <td>{{ $krs->jadwal?->dosen?->nama ?? '-' }}</td>
                                <td>{{ $krs->jadwal?->kelas ?? '-' }}</td>
                                <td>{{ $krs->jadwal?->hari ?? '-' }}</td>
                                <td>{{ $krs->jadwal?->jam ?? '-' }}</td>
                                @if(Auth::user()->role === 'admin')
                                    <td>
                                        <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Drop mata kuliah ini?')">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada mata kuliah yang diambil</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <a href="{{ route('form-krs', ['npm' => $dataMahasiswa->npm]) }}" class="btn btn-primary btn-sm">Tambah Mata
                    Kuliah</a>
                <a href="{{ route('krs') }}" class="btn btn-secondary btn-sm">Kembali</a>

                <a href="{{ route('krs.export-pdf', $dataMahasiswa->npm) }}" class="btn btn-danger btn-sm">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <a href="{{ route('krs.export-excel', $dataMahasiswa->npm) }}" class="btn btn-success btn-sm">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>

            </div>
        </div>
    </div>
@endsection