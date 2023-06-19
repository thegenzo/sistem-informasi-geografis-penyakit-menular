<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use Validator;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $village = Village::all();

        return view('admin-panel.pages.village.index', compact('village'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.village.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'district_id'   => 'required',
            'name'          => 'required',
            'coordinates'   => 'required',
        ];

        $messages = [
            'district_id.required'  => 'Nama kecamatan wajib diisi',
            'name.required'         => 'Nama kelurahan wajib diisi',
            'coordinates.required'  => 'Koordinat wilayah wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        Village::create($data);

        return redirect()->route('admin-panel.villages.index')->with('success', 'Data Kelurahan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Village $village)
    {
        // $data = $village->coordinates['geometry']['coordinates'][0];
        // return response()->json($data);
        return view('admin-panel.pages.village.edit', compact('village'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Village $village)
    {
        $rules = [
            'district_id'   => 'required',
            'name'          => 'required',
            'coordinates'   => 'required',
        ];

        $messages = [
            'district_id.required'  => 'Nama kecamatan wajib diisi',
            'name.required'         => 'Nama kelurahan wajib diisi',
            'coordinates.required'  => 'Koordinat wilayah wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $village->update($data);

        return redirect()->route('admin-panel.villages.index')->with('success', 'Data Kelurahan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Village $village)
    {
        $village->delete();

        return redirect()->back()->with('success', 'Data kelurahan berhasil dihapus!');
    }
}
