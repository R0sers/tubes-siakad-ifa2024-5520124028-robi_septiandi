<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { margin-bottom: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h1>ROXE University</h1>
    <h2>Kartu Rencana Studi (KRS)</h2>
    <p>NPM: {{ $dataMahasiswa->npm }}<br>Nama: {{ $dataMahasiswa->nama }}</p>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Matkul</th>
                <th>Nama Mata Kuliah</th>
                <th>Dosen</th>
                <th>Kelas</th>
                <th>Hari</th>
                <th>Jam</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataKRS as $krs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $krs->kode_matakuliah }}</td>
                    <td>{{ $krs->jadwal?->matakuliah?->nama_matakuliah ?? '-' }}</td>
                    <td>{{ $krs->jadwal?->dosen?->nama ?? '-' }}</td>
                    <td>{{ $krs->jadwal?->kelas ?? '-' }}</td>
                    <td>{{ $krs->jadwal?->hari ?? '-' }}</td>
                    <td>{{ $krs->jadwal?->jam ?? '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align:center">Belum ada mata kuliah yang diambil</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>