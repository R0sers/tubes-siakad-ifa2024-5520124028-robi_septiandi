<?php

namespace App\Exports;

use App\Models\KRS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KRSExport implements FromCollection, WithHeadings, WithMapping
{
    protected $npm;

    public function __construct($npm)
    {
        $this->npm = $npm;
    }

    public function collection()
    {
        return KRS::with('jadwal.dosen', 'jadwal.matakuliah')
            ->where('npm', $this->npm)
            ->get();
    }

    public function headings(): array
    {
        return ['NO', 'Kode Matkul', 'Nama Mata Kuliah', 'Dosen', 'Kelas', 'Hari', 'Jam'];
    }

    public function map($krs): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $krs->kode_matakuliah,
            $krs->jadwal?->matakuliah?->nama_matakuliah ?? '-',
            $krs->jadwal?->dosen?->nama ?? '-',
            $krs->jadwal?->kelas ?? '-',
            $krs->jadwal?->hari ?? '-',
            $krs->jadwal?->jam ?? '-',
        ];
    }
}