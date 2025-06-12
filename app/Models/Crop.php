<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'name',
        'variety',
        'start_date',
        'est_harvest_date',
        'user_created_id',
        'user_created_name',
        'user_updated_id',
        'user_update_name'
    ];

    public function land()
    {
        return $this->belongsTo(Land::class);
    }
}
