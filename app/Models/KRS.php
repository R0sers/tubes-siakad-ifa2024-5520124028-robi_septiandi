<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KRS extends Model
{
    protected $table = 'krs';

    protected $primaryKey = 'id';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];



    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }
}
