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
        $districts = District::all();

        return $districts;
    }

    public function getAllHealthcares()
    {
        $healthcares = HealthcareFacilities::with('district')->get();

        return $healthcares;
    }
}
