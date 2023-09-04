<?php

namespace App\Http\Controllers;

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
                        GROUP_CONCAT(DISTINCT diseases.name) as disease_names
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

    public function getAllHealthcares()
    {
        $healthcares = HealthcareFacilities::with('district')->get();

        return $healthcares;
    }
}
