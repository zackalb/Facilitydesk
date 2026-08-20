<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_rab', 'tanggal_transaksi', 'kategori', 'jumlah_rp', 'status_transaksi'];

    public function budgetProposal()
    {
        return $this->belongsTo(BudgetProposal::class, 'id_rab', 'id_rab');
    }
}
