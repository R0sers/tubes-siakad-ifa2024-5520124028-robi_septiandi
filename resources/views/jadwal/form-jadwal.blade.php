@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Tambah data Jadwal</h1>
        <div class="card">
            <div class="card-header">Tambah Jadwal</div>
            <div class="card-body">
                <form method="POST" action="{{ route('jadwalstore') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <select class="form-control" name="kode_matakuliah">
                            <option value="">-- Pilih Mata Kuliah --</option>
                            @foreach($matakuliah as $mk)
                                <option value="{{ $mk->kode_matakuliah }}">
                                    {{ $mk->kode_matakuliah }} - {{ $mk->nama_matakuliah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <select class="form-control" name="nidn">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosen as $dsn)
                                <option value="{{ $dsn->nidn }}">
                                    {{ $dsn->nidn }} - {{ $dsn->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="">-- Pilih Kelas --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select class="form-control" name="hari">
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <select class="form-control" name="jam">
                            <option value="">-- Pilih Jam --</option>
                            <option value="08.00-10.30">08.00-10.30</option>
                            <option value="10.30-13.00">10.30-13.00</option>
                            <option value="13.00-15.30">13.00-15.30</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection