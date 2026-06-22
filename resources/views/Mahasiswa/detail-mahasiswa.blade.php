@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail Mahasiswa</h1>
        <div class="card">
            <div class="card-header">Detail Mahasiswa</div>
            <div class="card-body">
                <p>NPM : <b>{{ $dataMahasiswa->npm }}</b></p>
                <p>Nama Mahasiswa : <b>{{ $dataMahasiswa->nama }}</b></p>
                <p>NIDN : <b>{{ $dataMahasiswa->nidn }}</b></p>
                <p>Nama Dosen : <b>{{ $dataMahasiswa->dosen?->nama ?? '--' }}</b></p>
            </div>
        </div>
    </div>
@endsection