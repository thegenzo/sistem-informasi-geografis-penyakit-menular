<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\HealthcareFacilities;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin-panel.pages.dashboard');
    }

    public function getAllDistricts()
    {
        $districts = District::selectRaw('districts.id, districts.name, districts.coordinates, SUM(cases.total) as total_cases')
                        ->leftJoin('healthcare_facilities', 'districts.id', '=', 'healthcare_facilities.district_id')
                        ->leftJoin('cases', 'healthcare_facilities.id', '=', 'cases.healthcare_facilities_id')
                        ->groupBy('districts.id', 'districts.name', 'districts.coordinates')
                        ->get();

        return $districts;
    }

    public function getAllHealthcares()
    {
        $healthcares = HealthcareFacilities::with('district')->get();

        return $healthcares;
    }
}
