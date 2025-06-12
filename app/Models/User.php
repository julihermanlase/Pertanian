<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_PETANI = 'petani';

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
        'user_created_id',
        'user_created_name',
        'user_updated_id',
        'user_updated_name',
    ];

    /**
     * The attributes that should be hidden for arrays and JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'string',
        'role' => 'string',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    public function createdUsers()
    {
        return $this->hasMany(User::class, 'user_created_id');
    }

    public function updatedUsers()
    {
        return $this->hasMany(User::class, 'user_updated_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', self::ROLE_ADMIN);
    }

    public function scopePetani($query)
    {
        return $query->where('role', self::ROLE_PETANI);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isPetani(): bool
    {
        return $this->role === self::ROLE_PETANI;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function getNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }
}
