<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'npm';

    protected $guarded = ['created_at', 'updated_at'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'npm', 'npm');
    }

    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class, 'krs', 'npm', 'kode_matakuliah');
    }
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'id', 'id');
    }
}
