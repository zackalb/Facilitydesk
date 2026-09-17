<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DamageReport extends Model
{
    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'id_user',
        'technician_id',
        'id_fasilitas',
        'category_id',
        'tanggal_waktu',
        'deskripsi_kerusakan',
        'foto_bukti',
        'is_emergency',
        'tingkat_urgensi',
        'status_laporan',
        'technician_read_at',
        'pelapor_read_at',
    ];

    /**
     * Relasi ke pelapor (User).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke teknisi penanggung jawab (User).
     */
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id_user');
    }

    /**
     * Relasi ke kategori kerusakan.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Relasi ke fasilitas yang dilaporkan rusak.
     */
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'id_fasilitas', 'id_fasilitas');
    }

    /**
     * Relasi ke hasil verifikasi sarpras.
     */
    public function verification()
    {
        return $this->hasOne(Verification::class, 'id_laporan', 'id_laporan');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tanggal_waktu' => 'datetime',
            'technician_read_at' => 'datetime',
            'pelapor_read_at' => 'datetime',
        ];
    }
}
