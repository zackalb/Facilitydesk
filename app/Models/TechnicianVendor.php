<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnicianVendor extends Model
{
    protected $primaryKey = 'id_teknisi';
    protected $fillable = ['nama_teknisi', 'jenis_teknisi', 'kontak'];

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class, 'id_teknisi', 'id_teknisi');
    }
}
