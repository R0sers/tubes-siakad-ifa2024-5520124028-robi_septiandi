@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Tambah data Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ route('mahasiswastore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" name="id">
                        @error('id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah">
                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" name="nidn">
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" name="kelas">
                        @error('kelas')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <input type="text" class="form-control" name="hari">
                        @error('hari')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection