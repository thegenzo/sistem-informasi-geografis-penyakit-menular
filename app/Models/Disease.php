<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'name',
        'description',
    ];

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
