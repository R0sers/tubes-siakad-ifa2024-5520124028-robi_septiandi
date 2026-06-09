<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $primaryKey = 'id';

    protected $guarded = ['created_at', 'updated_at'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function MataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }

    
}
