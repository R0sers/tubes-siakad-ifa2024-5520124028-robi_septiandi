<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliah';

    protected $primaryKey = 'kode_matakuliah';

    protected $keyType = 'string';    

    protected $guarded = ['created_at', 'updated_at'];

   public function krs()
   {
       return $this->hasOne(KRS::class, 'kode_matakuliah', 'kode_matakuliah');
   }

}
