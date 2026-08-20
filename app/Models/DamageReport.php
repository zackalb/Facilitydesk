<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $primaryKey = 'id_laporan';
    protected $fillable = ['id_user', 'id_fasilitas', 'tanggal_waktu', 'deskripsi_kerusakan', 'foto_bukti', 'is_emergency', 'status_laporan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'id_fasilitas', 'id_fasilitas');
    }

    public function verification()
    {
        return $this->hasOne(Verification::class, 'id_laporan', 'id_laporan');
    }
}
