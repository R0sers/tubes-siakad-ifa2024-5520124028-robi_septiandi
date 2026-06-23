@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail Jadwal</h1>
        <div class="card">
            <div class="card-header">Detail Jadwal</div>
            <div class="card-body">
                <p>Kode Matakuliah: {{ $dataJadwal->kode_matakuliah }}</p>
                <p>NIDN: {{ $dataJadwal->nidn }}</p>
                <p>Kelas: {{ $dataJadwal->kelas }}</p>
                <p>Hari: {{ $dataJadwal->hari }}</p>
            </div>
        </div>
    </div>
@endsection