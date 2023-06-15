<?php

namespace App\Http\Controllers;

use App\Models\HealthcareFacilities;
use Illuminate\Http\Request;
use Validator;

class HealthcareFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthcareFacilities = HealthcareFacilities::all();

        return view('admin-panel.pages.healthcare-facilities.index', compact('healthcareFacilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.healthcare-facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                      => 'required',
            'longitude'                 => 'required',
            'latitude'                  => 'required',
            'address'                   => 'required',
            'contact_information'       => 'required',
        ];

        $messages = [
            'name.required'                     => 'Nama fasilitas kesehatan wajib diisi',
            'longitude.required'                => 'Longitude wajib diisi',
            'latitude.required'                 => 'Latitude wajib diisi',
            'address.required'                  => 'Alamat wajib diisi',
            'contact_information.required'      => 'Informati kontak wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        HealthcareFacilities::create($data);

        return redirect()->route('admin-panel.healthcare-facilities.index')->with('success', 'Fasilitas kesehatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthcareFacilities $healthcareFacilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthcareFacilities $healthcareFacilities)
    {
        return view('admin-panel.healthcare-facilities.edit', compact('healthcareFacilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthcareFacilities $healthcareFacilities)
    {
        $rules = [
            'name'                      => 'required',
            'longitude'                 => 'required',
            'latitude'                  => 'required',
            'address'                   => 'required',
            'contact_information'       => 'required',
        ];

        $messages = [
            'name.required'                     => 'Nama fasilitas kesehatan wajib diisi',
            'longitude.required'                => 'Longitude wajib diisi',
            'latitude.required'                 => 'Latitude wajib diisi',
            'address.required'                  => 'Alamat wajib diisi',
            'contact_information.required'      => 'Informati kontak wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $healthcareFacilities->update($data);

        return redirect()->route('admin-panel.healthcare-facilities.index')->with('success', 'Fasilitas kesehatan berhasil diedit!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthcareFacilities $healthcareFacilities)
    {
        $healthcareFacilities->delete();

        return redirect()->back()->with('success', 'Fasilitas kesehatan berhasil dihapus!');
    }
}
