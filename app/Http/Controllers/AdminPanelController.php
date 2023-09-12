<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Disease;
use App\Models\District;
use App\Models\HealthcareFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin-panel.pages.dashboard');
    }

    public function getAllDistricts()
    {
        $districts = District::selectRaw('
                        districts.id as district_id,
                        districts.name as district_name,
                        districts.coordinates,
                        IFNULL(SUM(cases.total), NULL) as total_cases,
                        GROUP_CONCAT(DISTINCT diseases.name) as disease_names
                    ')
                    ->leftJoin('healthcare_facilities', function ($join) {
                        $join->on('districts.id', '=', 'healthcare_facilities.district_id');
                    })
                    ->leftJoin('cases', function ($join) {
                        $join->on('healthcare_facilities.id', '=', 'cases.healthcare_facilities_id');
                    })
                    ->leftJoin('diseases', function ($join) {
                        $join->on('cases.disease_id', '=', 'diseases.id');
                    })
                    ->groupBy('districts.id', 'districts.name', 'districts.coordinates')
                    ->get();

        return $districts;
    }

    public function getDistrictsByDiseaseId($id)
    {
        $districts = District::selectRaw('
                        districts.id as district_id,
                        districts.name as district_name,
                        districts.coordinates,
                        IFNULL(SUM(cases.total), NULL) as total_cases,
                        GROUP_CONCAT(DISTINCT diseases.name) as disease_names,
                        SUM(CASE WHEN cases.gender = "male" THEN cases.total ELSE 0 END) as total_male_cases,
                        SUM(CASE WHEN cases.gender = "female" THEN cases.total ELSE 0 END) as total_female_cases,
                        SUM(CASE WHEN cases.gender = "m+f" THEN cases.total ELSE 0 END) as total_mf_cases,
                        SUM(CASE WHEN cases.status = "suspected" THEN cases.total ELSE 0 END) as total_suspected_cases,
                        SUM(CASE WHEN cases.status = "confirmed" THEN cases.total ELSE 0 END) as total_confirmed_cases,
                        SUM(CASE WHEN cases.status = "recovered" THEN cases.total ELSE 0 END) as total_recovered_cases,
                        SUM(CASE WHEN cases.status = "deceased" THEN cases.total ELSE 0 END) as total_deceased_cases,
                        SUM(CASE WHEN cases.severity = "mild" THEN cases.total ELSE 0 END) as total_mild_cases,
                        SUM(CASE WHEN cases.severity = "moderate" THEN cases.total ELSE 0 END) as total_moderate_cases,
                        SUM(CASE WHEN cases.severity = "severe" THEN cases.total ELSE 0 END) as total_severe_cases,
                        SUM(CASE WHEN cases.severity = "critical" THEN cases.total ELSE 0 END) as total_critical_cases,
                        SUM(CASE WHEN cases.severity = "asymptomatic" THEN cases.total ELSE 0 END) as total_asymptomatic_cases
                    ')
                    ->leftJoin('healthcare_facilities', 'districts.id', '=', 'healthcare_facilities.district_id')
                    ->leftJoin('cases', function ($join) use ($id) {
                        $join->on('healthcare_facilities.id', '=', 'cases.healthcare_facilities_id')
                            ->where('cases.disease_id', '=', $id);
                    })
                    ->leftJoin('diseases', 'cases.disease_id', '=', 'diseases.id')
                    ->groupBy('districts.id', 'districts.name', 'districts.coordinates')
                    ->get();
    
        return $districts;
    }
    

    public function getAllDiseasesByDistrict()
    {
        $districtId = 1; // Replace with the desired District's ID

        $diseaseDataInDistrict = Disease::whereHas('cases.healthcare_facilities.district', function ($query) use ($districtId) {
            $query->where('id', $districtId);
        })->get();

        return $diseaseDataInDistrict;
    }

    public function getCasesByDistrict($id)
    {
        $cases = Cases::with(['healthcare_facilities' => function ($query) use ($id) {
            $query->where('district_id', $id);
        }])
        ->whereHas('healthcare_facilities', function ($query) use ($id) {
            $query->where('district_id', $id);
        })
        ->get()
        ->groupBy(function ($data) {
            return $data->disease->name;
        });
    
        return $cases;
    }

    public function getAllHealthcares()
    {
        $healthcares = HealthcareFacilities::with('district')->get();

        return $healthcares;
    }
}
