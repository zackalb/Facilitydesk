<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
{
    use HasFactory;

    protected $table = 'facility_categories';

    protected $fillable = [
        'name',
        'category_id',
    ];

    /**
     * Relasi ke Bidang Teknisi (Category).
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
