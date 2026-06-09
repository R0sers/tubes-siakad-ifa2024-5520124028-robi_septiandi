<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class KRS extends Model
{
    protected $table = 'krs'; 
    
    protected $primaryKey = 'id';
    
    protected $guarded = [
        'created_at', 'updated_at'
    ];



    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}
