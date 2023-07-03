<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

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
}
