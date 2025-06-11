<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'string',
        'role' => 'string',
    ];

    /**
     * Relations to the user who created this user.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    /**
     * Relations to the user who last updated this user.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    /**
     * Users created by this user.
     */
    public function createdUsers()
    {
        return $this->hasMany(User::class, 'user_created_id');
    }

    /**
     * Users updated by this user.
     */
    public function updatedUsers()
    {
        return $this->hasMany(User::class, 'user_updated_id');
    }

    /**
     * Check if the user has 'admin' role.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user has 'petani' role.
     */
    public function isPetani(): bool
    {
        return $this->role === 'petani';
    }

    /**
     * Check if the user is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
