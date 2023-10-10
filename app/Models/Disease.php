<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cover_image',
        'name',
        'description',
    ];

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
