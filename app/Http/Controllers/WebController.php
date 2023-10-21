<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Disease;
use App\Models\HealthcareFacilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        return view('web.home');
    }

    public function diseases()
    {
        $diseases = Disease::paginate(6);

        return view('web.diseases', compact('diseases'));
    }

    public function diseases_detail($id)
    {
        $disease = Disease::find($id);

        return view('web.diseases-detail', compact('disease'));
    }

    public function cases($id)
    {
        // get healthcare facilities
        $healthcare = HealthcareFacilities::find($id);

        $cases = Cases::with('disease')->where('healthcare_facilities_id', $healthcare->id)
                        ->get()
                        ->groupBy(function ($data) {
                            return $data->disease->name;
                        });

        $arrTotalCases = [];

        foreach ($cases as $diseaseName => $diseaseCases) {
            $totalCases = $diseaseCases->sum('total');
            $arrTotalCases[$diseaseName] = $totalCases;
        }

        // Calculate the total cases
        $totalCases = array_sum($arrTotalCases);

        // Calculate percentages and update the array
        $percentages = [];
        foreach ($arrTotalCases as $disease => $total) {
            $percentage = ($total / $totalCases) * 100;
            $percentages[$disease] = $percentage;
        }

        return view('web.cases', compact('cases', 'healthcare', 'arrTotalCases', 'percentages'));
    }
}
