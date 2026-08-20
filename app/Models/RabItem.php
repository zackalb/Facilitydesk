<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RabItem extends Model
{
    protected $primaryKey = 'id_item';
    protected $fillable = ['id_rab', 'nama_sarana_jasa', 'qty', 'satuan', 'harga_satuan', 'subtotal'];

    public function budgetProposal()
    {
        return $this->belongsTo(BudgetProposal::class, 'id_rab', 'id_rab');
    }
}
