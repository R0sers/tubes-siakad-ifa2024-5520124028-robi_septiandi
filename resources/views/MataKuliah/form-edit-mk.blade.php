@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Edit Data Matakuliah</h1>
        <div class="card">
            <div class="card-header">Edit Matakuliah</div>
            <div class="card-body">
                <form method="POST" action="{{ route('matkul.update', $matkul->kode_matakuliah) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah" value="{{ $matkul->kode_matakuliah }}" readonly>
                        @error('kode_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah" value="{{ $matkul->nama_matakuliah }}">
                        @error('nama_matakuliah')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SKS</label>
                        <input type="number" class="form-control" name="sks" value="{{ $matkul->sks }}">
                        @error('sks')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection