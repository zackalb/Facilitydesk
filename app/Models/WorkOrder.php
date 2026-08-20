<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $primaryKey = 'id_wo';
    protected $fillable = ['id_verifikasi', 'id_teknisi', 'prioritas', 'tanggal_mulai', 'tanggal_selesai', 'foto_after'];

    public function verification()
    {
        return $this->belongsTo(Verification::class, 'id_verifikasi', 'id_verifikasi');
    }

    public function technicianVendor()
    {
        return $this->belongsTo(TechnicianVendor::class, 'id_teknisi', 'id_teknisi');
    }

    public function functionalTestHandover()
    {
        return $this->hasOne(FunctionalTestHandover::class, 'id_wo', 'id_wo');
    }
}
