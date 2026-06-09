<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'nidn';

    

    protected $guarded = ['created_at', 'updated_at'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'nidn', 'nidn');
    }
}
