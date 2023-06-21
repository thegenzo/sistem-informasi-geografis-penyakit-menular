<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Http\Request;
use Validator;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = Cases::latest()->get();

        return view('admin-panel.pages.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.cases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'disease_id'                => 'required',
            'healthcare_facilities_id'  => 'required',
            'reported_at'               => 'required',
            'status'                    => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'severity'                  => 'required',
        ];

        $messages = [
            'disease_id.required'                   => 'Penyakit wajib diisi',
            'healthcare_facilities_id.required'     => 'Fasilitas Kesehatan wajib diisi',
            'reported_at.required'                  => 'Tanggal laporan kasus wajib diisi',
            'status.required'                       => 'Status penyakit wajib diisi',
            'age.required'                          => 'Usia wajib diisi',
            'gender.required'                       => 'Jenis kelamin wajib diisi',
            'severity.required'                     => 'Tingkat kekerasan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['disease_id'] = $request->disease_id;
        $data['healthcare_facilities_id'] = $request->healthcare_facilities_id;
        Cases::create($data);

        return redirect()->route('admin-panel.cases.index')->with('success', 'Data kasus berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cases $cases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cases $cases, $id)
    {  
        $cases = Cases::find($id);
        return view('admin-panel.pages.cases.edit', compact('cases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cases $cases, $id)
    {
        $rules = [
            'disease_id'                => 'required',
            'healthcare_facilities_id'  => 'required',
            'reported_at'               => 'required',
            'status'                    => 'required',
            'age'                       => 'required',
            'gender'                    => 'required',
            'severity'                  => 'required',
        ];

        $messages = [
            'disease_id.required'                   => 'Penyakit wajib diisi',
            'healthcare_facilities_id.required'     => 'Fasilitas Kesehatan wajib diisi',
            'reported_at.required'                  => 'Tanggal laporan kasus wajib diisi',
            'status.required'                       => 'Status penyakit wajib diisi',
            'age.required'                          => 'Usia wajib diisi',
            'gender.required'                       => 'Jenis kelamin wajib diisi',
            'severity.required'                     => 'Tingkat kekerasan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['disease_id'] = $request->disease_id;
        $data['healthcare_facilities_id'] = $request->healthcare_facilities_id;
        $cases = Cases::find($id);
        $cases->update($data);

        return redirect()->route('admin-panel.cases.index')->with('success', 'Data kasus berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cases $cases)
    {
        $cases->delete();

        return redirect()->back()->with('success', 'Data kasus berhasil dihapus!');
    }
}
