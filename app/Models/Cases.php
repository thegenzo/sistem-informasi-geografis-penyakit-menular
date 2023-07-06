<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_id',
        'healthcare_facilities_id',
        'status',
        'age',
        'gender',
        'total',
        'severity'
    ];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function healthcare_facilities()
    {
        return $this->belongsTo(HealthcareFacilities::class);
    }
}
