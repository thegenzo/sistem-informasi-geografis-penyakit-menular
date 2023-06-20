<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareFacilities extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'longitude',
        'latitude',
        'address',
        'type',
        'contact_information'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
