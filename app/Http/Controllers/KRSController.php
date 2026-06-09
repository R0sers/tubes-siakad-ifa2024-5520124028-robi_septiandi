<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KRS;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKRS = KRS::when(request('search'), function ($query, $search) {
            return $query->where('id', 'like', "%{$search}%")
                        ->orWhere('npm', 'like', "%{$search}%")
            ->orWhereHas('MataKuliah', function ($q2) use ($search) {
            $q2->where('kode_matakuliah', 'like', "%{$search}%");
                        });
        })
        ->orderBy('id', 'asc')
        ->paginate(15)
        ->withQueryString();

        return view('krs.krs', compact('dataKRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('krs.form-krs');
    }

    /**
     * Store a newly created resource in storage.
     */
            public function store(Request $request)
        {
            $validated = $request->validate([
                'id' => 'required|numeric|unique:krs',
                'npm'  => 'required|numeric|exists:mahasiswa,npm',  
                'kode_matakuliah' => 'required',
            ]);

            KRS::create($validated);
            return redirect()->route('krs')->with('success', 'Data berhasil ditambah');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
        $dataKRS = KRS::findOrFail($id);        

        return view('krs.detail-krs', compact('dataKRS'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataKRS = KRS::where('id', $id)->firstOrFail();
        return view('krs.form-edit-krs', compact('dataKRS'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'npm'  => 'required|numeric',
            'kode_matakuliah' => 'required',
        ]);

        KRS::where('id', $id)->update($validated);
        return redirect()->route('krs')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KRS::where('id', $id)->delete();

        return redirect()->route('krs')
                ->with('success', 'Data berhasil dihapus');
    }

}