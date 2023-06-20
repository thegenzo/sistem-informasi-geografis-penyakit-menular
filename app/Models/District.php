<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coordinates'
    ];

    public function healthcare_facilities()
    {
        return $this->hasMany(HealthcareFacilities::class);
    }
}
