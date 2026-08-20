<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetProposal extends Model
{
    protected $primaryKey = 'id_rab';
    protected $fillable = ['id_verifikasi', 'id_anggaran', 'estimasi_biaya', 'rincian_kebutuhan', 'status_persetujuan'];

    public function verification()
    {
        return $this->belongsTo(Verification::class, 'id_verifikasi', 'id_verifikasi');
    }

    public function schoolBudget()
    {
        return $this->belongsTo(SchoolBudget::class, 'id_anggaran', 'id_anggaran');
    }

    public function items()
    {
        return $this->hasMany(RabItem::class, 'id_rab', 'id_rab');
    }

    public function transactionLogs()
    {
        return $this->hasMany(TransactionLog::class, 'id_rab', 'id_rab');
    }
}
