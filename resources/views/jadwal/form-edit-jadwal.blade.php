@extends('layout.template')

@section('content')
    <div class="container mt-3">
        <h1>Edit Data Jadwal</h1>
        <div class="card">
            <div class="card-header">Edit Jadwal</div>
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

                <form method="POST" action="{{ route('jadwalupdate', $dataJadwal->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah"
                            value="{{ $dataJadwal->kode_matakuliah }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <select class="form-control" name="nidn">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach($dosen as $dsn)
                                <option value="{{ $dsn->nidn }}"
                                    {{ old('nidn', $dataJadwal->nidn) == $dsn->nidn ? 'selected' : '' }}>
                                    {{ $dsn->nidn }} - {{ $dsn->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach(['A','B','C','D','E'] as $k)
                                <option value="{{ $k }}" {{ old('kelas', $dataJadwal->kelas) == $k ? 'selected' : '' }}>
                                    {{ $k }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hari</label>
                        <select class="form-control" name="hari">
                            <option value="">-- Pilih Hari --</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat'] as $h)
                                <option value="{{ $h }}" {{ old('hari', $dataJadwal->hari) == $h ? 'selected' : '' }}>
                                    {{ $h }}
                                </option>
                            @endforeach
                        </select>
                        @error('hari')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <select class="form-control" name="jam">
                            <option value="">-- Pilih Jam --</option>
                            @foreach(['08.00-10.30','10.30-13.00','13.00-15.30'] as $j)
                                <option value="{{ $j }}" {{ old('jam', $dataJadwal->jam) == $j ? 'selected' : '' }}>
                                    {{ $j }}
                                </option>
                            @endforeach
                        </select>
                        @error('jam')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection