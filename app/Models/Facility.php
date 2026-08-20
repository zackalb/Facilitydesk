<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $primaryKey = 'id_fasilitas';
    protected $fillable = ['nama_fasilitas', 'lokasi_detail', 'kategori_area', 'kondisi'];

    public function damageReports()
    {
        return $this->hasMany(DamageReport::class, 'id_fasilitas', 'id_fasilitas');
    }
}
