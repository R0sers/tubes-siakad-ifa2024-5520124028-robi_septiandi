@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>(KRS) Input Mata Kuliah</h1>
        <div class="card">
            <div class="card-header">Tambah Mata Kuliah</div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('krsstore') }}">
                    @csrf

                    @if($dataMahasiswa)
                        <div class="mb-3">
                            <label class="form-label">Mahasiswa</label>
                            <input type="text" class="form-control"
                                value="{{ $dataMahasiswa->npm }} - {{ $dataMahasiswa->nama }}" disabled>
                            <input type="hidden" name="npm" value="{{ $dataMahasiswa->npm }}">
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Mata Kuliah</label>
                        <select class="form-control" name="jadwal_id">
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach($dataJadwal as $jadwal)
                                <option value="{{ $jadwal->id }}" {{ old('jadwal_id') == $jadwal->id ? 'selected' : '' }}>
                                    {{ $jadwal->kode_matakuliah }} - {{ $jadwal->matakuliah?->nama_matakuliah }}
                                    (Kelas {{ $jadwal->kelas }}, {{ $jadwal->hari }} {{ $jadwal->jam }},
                                    {{ $jadwal->dosen?->nama }})
                                </option>
                            @endforeach
                        </select>
                        @error('jadwal_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection