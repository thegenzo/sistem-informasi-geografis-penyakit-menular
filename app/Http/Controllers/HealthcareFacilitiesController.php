<?php

namespace App\Http\Controllers;

use App\Models\District;
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
            'district_id'               => 'required',
            'name'                      => 'required',
            'longitude'                 => 'required',
            'latitude'                  => 'required',
            'address'                   => 'required',
            'type'                      => 'required',
            'contact_information'       => 'required',
        ];

        $messages = [
            'district_id.required'              => 'Kecamatan wajib diisi',
            'name.required'                     => 'Nama fasilitas kesehatan wajib diisi',
            'longitude.required'                => 'Longitude wajib diisi',
            'latitude.required'                 => 'Latitude wajib diisi',
            'address.required'                  => 'Alamat wajib diisi',
            'type.required'                     => 'Tipe fasilitas kesehatan wajib diisi',
            'contact_information.required'      => 'Informati kontak wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['district_id'] = $request->district_id;
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
    public function edit(HealthcareFacilities $healthcareFacilities, $id)
    {
        $healthcareFacilities = HealthcareFacilities::find($id);
        return view('admin-panel.pages.healthcare-facilities.edit', compact('healthcareFacilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthcareFacilities $healthcareFacilities)
    {
        $rules = [
            'district_id'               => 'required',
            'name'                      => 'required',
            'longitude'                 => 'required',
            'latitude'                  => 'required',
            'address'                   => 'required',
            'type'                      => 'required',
            'contact_information'       => 'required',
        ];

        $messages = [
            'district_id.required'              => 'Kecamatan wajib diisi',
            'name.required'                     => 'Nama fasilitas kesehatan wajib diisi',
            'longitude.required'                => 'Longitude wajib diisi',
            'latitude.required'                 => 'Latitude wajib diisi',
            'address.required'                  => 'Alamat wajib diisi',
            'type.required'                     => 'Tipe fasilitas kesehatan wajib diisi',
            'contact_information.required'      => 'Informati kontak wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['district_id'] = $request->district_id;
        $healthcareFacilities->update($data);

        return redirect()->route('admin-panel.healthcare-facilities.index')->with('success', 'Fasilitas kesehatan berhasil diedit!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthcareFacilities $healthcareFacilities, $id)
    {
        if($healthcareFacilities->cases()->count() > 0) {
            return redirect()->back()->with('failed', 'Fasilitas kesehatan memiliki data relasi dengan kasus!');
        }
        
        $healthcareFacilities = HealthcareFacilities::find($id);
        $healthcareFacilities->delete();

        return redirect()->back()->with('success', 'Fasilitas kesehatan berhasil dihapus!');
    }

    public function getDistrictPolygon($id)
    {
        $district = District::where('id', $id)->first();
        
        return $district;
    }
}
