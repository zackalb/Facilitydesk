<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FunctionalTestHandover extends Model
{
    protected $primaryKey = 'id_serah_terima';
    protected $fillable = ['id_wo', 'tanggal_pengujian', 'hasil_pengujian', 'bukti_tanda_tangan'];

    public function workOrder()
    {
        return $this->belongsTo(WorkOrder::class, 'id_wo', 'id_wo');
    }
}
