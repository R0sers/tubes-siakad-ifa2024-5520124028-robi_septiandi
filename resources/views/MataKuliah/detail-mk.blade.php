@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail Matakuliah</h1>
        <div class="card">
            <div class="card-header">Detail Matakuliah</div>
            <div class="card-body">
                <p>Kode Matakuliah: {{ $matkul->kode_matakuliah }}</p>
                <p>Nama Matakuliah: {{ $matkul->nama_matakuliah }}</p>
                <p>SKS: {{ $matkul->sks }}</p>
            </div>
        </div>
    </div>
@endsection