<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $primaryKey = 'id_verifikasi';
    protected $fillable = ['id_laporan', 'tanggal_verifikasi', 'kategori_kerusakan', 'catatan_inspeksi'];

    public function damageReport()
    {
        return $this->belongsTo(DamageReport::class, 'id_laporan', 'id_laporan');
    }

    public function budgetProposal()
    {
        return $this->hasOne(BudgetProposal::class, 'id_verifikasi', 'id_verifikasi');
    }

    public function workOrder()
    {
        return $this->hasOne(WorkOrder::class, 'id_verifikasi', 'id_verifikasi');
    }
}
