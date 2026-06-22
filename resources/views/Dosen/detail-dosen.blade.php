@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Halaman Detail Dosen</h1>
        <div class="card">
            <div class="card-header">Detail Dosen</div>
            <div class="card-body">
                <p>NIDN: <b>{{ $dataDosen->nidn }}</b></p>
                <p>Nama: <b>{{ $dataDosen->nama }}</b></p>
            </div>
        </div>
    </div>
@endsection