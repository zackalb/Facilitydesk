<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolBudget extends Model
{
    protected $primaryKey = 'id_anggaran';
    protected $fillable = ['tahun_ajaran', 'total_anggaran', 'sisa_saldo'];

    public function budgetProposals()
    {
        return $this->hasMany(BudgetProposal::class, 'id_anggaran', 'id_anggaran');
    }
}
