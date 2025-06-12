<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'location',
        'area',
        'soil_type',
        'user_created_id',
        'user_created_name',
        'user_updated_id',
        'user_update_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crops()
    {
        return $this->hasMany(Crop::class);
    }
}
