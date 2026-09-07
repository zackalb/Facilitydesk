<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Relasi ke teknisi (User) yang memiliki spesialisasi di kategori ini.
     */
    public function technicians()
    {
        return $this->hasMany(User::class, 'category_id', 'id');
    }

    /**
     * Relasi ke semua laporan kerusakan dalam kategori ini.
     */
    public function damageReports()
    {
        return $this->hasMany(DamageReport::class, 'category_id', 'id');
    }
}
