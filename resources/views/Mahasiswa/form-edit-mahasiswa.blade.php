@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Edit Data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Edit Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mahasiswaupdate', $dataMahasiswa->npm) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm" value="{{ $dataMahasiswa->npm }}" readonly>
                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn" value="{{ $dataMahasiswa->nidn }}">
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="{{ $dataMahasiswa->nama }}">
                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection