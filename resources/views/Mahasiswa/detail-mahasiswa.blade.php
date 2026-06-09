@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Detail Mahasiswa</div>
            <div class="card-body">
                <p>NPM: {{ $dataMahasiswa->npm }}</p>
                <p>NIDN: {{ $dataMahasiswa->nidn }}</p>
                <p>Nama: {{ $dataMahasiswa->nama }}</p>
            </div>
        </div>
    </div>
@endsection