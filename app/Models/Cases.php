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

    public function getGenderAttribute($value) {
        $gender = '';
        if($value == 'male') {
            $gender = 'Laki-laki';
        } else if ($value = 'female') {
            $gender = 'Perempuan';
        } else {
            $gender = 'L+P';
        }

        return $gender;
    }

    public function getStatusAttribute($value) {
        $status = '';
        if($value == 'confirmed') {
            $status = 'Positif';
        } else if ($value == 'suspected') {
            $status = 'Terduga';
        } else if ($value == 'recovered') {
            $status = 'Sembuh';
        } else {
            $status = 'Meninggal';
        }

        return $status;
    }

    public function getSeverityAttribute($value) {
        $data = '';
        if($value == 'mild') {
            $data = 'Ringan';
        } else if ($value == 'moderate') {
            $data = 'Sedang';
        } else if ($value == 'severe') {
            $data = 'Berat';
        } else if ($value == 'critical') {
            $data = 'Kritis';
        } else {
            $data = 'Tanpa Gejala';
        }

        return $data;
    }
}
