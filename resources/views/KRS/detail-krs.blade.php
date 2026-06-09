@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail KRS</h1>
        <div class="card">
            <div class="card-header">Detail KRS</div>
            <div class="card-body">
                <p>ID: {{ $dataKRS->id }}</p>
                <p>NPM: {{ $dataKRS->npm }}</p>
                <p>Kode Matakuliah: {{ $dataKRS->kode_matakuliah }}</p>
            </div>
        </div>
    </div>
@endsection