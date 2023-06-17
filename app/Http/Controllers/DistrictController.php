<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district = District::all();

        return view('admin-panel.pages.district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.district.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required',
        ];

        $messages = [
            'name.required' => 'Nama kecamatan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        District::create($data);

        return redirect()->route('admin-panel.district.index')->with('success', 'Kecamatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        return view('admin-panel.pages.district.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        $rules = [
            'name'          => 'required',
        ];

        $messages = [
            'name.required' => 'Nama kecamatan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $district->update($data);

        return redirect()->route('admin-panel.district.index')->with('success', 'Kecamatan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        $district->delete();
        
        return redirect()->back()->with('success', 'Kecamatan berhasil ditambahkan!');
    }
}
