<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

#[Fillable(['nama', 'email', 'password', 'status', 'role', 'category_id'])]
#[Hidden(['password', 'remember_token', 'two_factor_secret', 'two_factor_recovery_codes'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $primaryKey = 'id_user';

    /**
     * Relasi ke kategori spesialisasi teknisi.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Relasi ke laporan yang dibuat oleh user (sebagai pelapor).
     */
    public function damageReports()
    {
        return $this->hasMany(DamageReport::class, 'id_user', 'id_user');
    }

    /**
     * Relasi ke laporan yang ditugaskan kepada teknisi (sebagai petugas penanggung jawab).
     */
    public function assignedReports()
    {
        return $this->hasMany(DamageReport::class, 'technician_id', 'id_user');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
