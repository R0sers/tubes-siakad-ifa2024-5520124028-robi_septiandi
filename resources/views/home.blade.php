@extends('layout.template')

@section('content')


    <div class="container mt-4">

        <div class="hero-academic">
            <div class="hero-eyebrow">Roxe University</div>
            <h1>Selamat datang, {{ Auth::user()->name }}</h1>
            <p>
                @if(Auth::user()->role === 'mahasiswa')
                    NPM {{ Auth::user()->npm }} &middot; Mahasiswa Aktif
                @else
                    Administrator Sistem Akademik
                @endif
            </p>
        </div>

        <div class="section-title">Ringkasan Akademik</div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="stat-card" style="--accent:#2563eb;">
                    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-label">Total Mahasiswa</div>
                    <div class="stat-value">{{ $totalMahasiswa }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card" style="--accent:#0f9d58;">
                    <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
                    <div class="stat-label">Total Dosen</div>
                    <div class="stat-value">{{ $totalDosen }}</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card" style="--accent:#d4af37;">
                    <div class="stat-icon"><i class="bi bi-journal-bookmark-fill"></i></div>
                    <div class="stat-label">Total Mata Kuliah</div>
                    <div class="stat-value">{{ $totalMatkul }}</div>
                </div>
            </div>
        </div>

    </div>
@endsection