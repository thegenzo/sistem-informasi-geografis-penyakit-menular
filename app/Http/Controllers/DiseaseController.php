<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disease = Disease::all();

        return view('admin-panel.pages.disease.index', compact('disease'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.disease.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'cover_image'               => 'required|image|mimes:jpeg,png,jpg',
            'name'                      => 'required',
            'description'               => 'required',
        ];

        $messages = [
            'cover_image.required'              => 'Sampul penyakit wajib diisi',
            'cover_image.image'                 => 'Sampul penyakit harus berupa gambar',
            'cover_image.mimes'                 => 'Sampul penyakit harus berformat gambar (jpeg, png atau jpg)',
            'name.required'                     => 'Nama penyakit kesehatan wajib diisi',
            'description.required'              => 'Deskripsi penyakit wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $cover_image = $request->file('cover_image');
        $filename = time() . '.jpg';
        $upload_filepath = 'public/disease';
        $path = $cover_image->storeAs($upload_filepath, $filename);

        $data = $request->all();
        unset($data['cover_image']);
        $data['cover_image'] = Storage::url($path);
        Disease::create($data);

        return redirect()->route('admin-panel.diseases.index')->with('success', 'Penyakit berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disease $disease)
    {
        return view('admin-panel.pages.disease.edit', compact('disease'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disease $disease)
    {
        $rules = [
            'name'                      => 'required',
            'description'               => 'required',
        ];

        $messages = [
            'name.required'                     => 'Nama penyakit kesehatan wajib diisi',
            'description.required'              => 'Deskripsi penyakit wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        if ($request->has('cover_image')) {
            $existing_image = basename($disease->cover_image);
            Storage::delete($existing_image);
            // PROSES UPLOAD cover_image DISINI
            $cover_image = $request->file('cover_image');
            $filename = time() . '.jpg';
            $upload_filepath = 'public/disease'; // Update the upload directory as per your requirement
            $path = $cover_image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        $disease->update($data);

        return redirect()->route('admin-panel.diseases.index')->with('success', 'Penyakit berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)
    {
        $existing_image = basename($disease->cover_image);
        Storage::delete($existing_image);

        $disease->delete();

        return redirect()->back()->with('success', 'Penyakit berhasil dihapus!');
    }
}
