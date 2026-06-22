@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Tambah data KRS</h1>
        <div class="card">
            <div class="card-header">Tambah KRS</div>
            <div class="card-body">
                <form method="POST" action="{{ route('krsstore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" name="npm">
                        @error('npm')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection