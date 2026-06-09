@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Edit Data KRS</h1>
        <div class="card">
            <div class="card-header">Edit KRS</div>
            <div class="card-body">
                <form method="POST" action="{{ route('krsupdate', $dataKRS->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm" value="{{ $dataKRS->npm }}" readonly>
                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="nama" value="{{ $dataKRS->kode_matakuliah }}">
                        @error('nama')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection