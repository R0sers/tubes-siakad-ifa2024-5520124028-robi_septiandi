<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMatkul = MataKuliah::all();
        $dataMatkul = MataKuliah::when(request('search'), function ($query, $search) {
            return $query->where('kode_matakuliah', 'like', "%{$search}%")
                ->orWhere('nama_matakuliah', 'like', "%{$search}%")
                ->orWhere('sks', 'like', "%{$search}%");
        })
            ->orderBy('kode_matakuliah', 'asc')
            ->paginate(5)
            ->withQueryString();

        return view('MataKuliah.mk', compact('dataMatkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = MataKuliah::all();

        return view('MataKuliah.form-mk', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required',
                'sks' => 'required|in:1,2,3,4,6'
                    ], [
                        'sks.required' => 'Jumlah SKS harus diisi.',
                        'sks.in' => 'Jumlah SKS hanya boleh 1, 2, 3, 4, atau 6.'
        ]);

        MataKuliah::create($validated);
        return redirect()->route('matkul')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matkul = MataKuliah::where('kode_matakuliah', $id)->first();
        return view('MataKuliah.detail-mk', compact('matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matkul = MataKuliah::where('kode_matakuliah', $id)->first();
        return view('MataKuliah.form-edit-mk', compact('matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required|unique:matakuliah,kode_matakuliah,' . $id . ',kode_matakuliah',
            'nama_matakuliah' => 'required',
            'sks' => 'required|in:1,2,3,4,6'
                    ], [
                        'sks.required' => 'Jumlah SKS harus diisi.',
                        'sks.in' => 'Jumlah SKS hanya boleh 1, 2, 3, 4, atau 6.'
        ]);

        MataKuliah::where('kode_matakuliah', $id)->update($validated);

        return redirect()->route('matkul')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MataKuliah::where('kode_matakuliah', $id)->delete();

        return redirect()->route('matkul')->with('delete', 'Data berhasil dihapus');

    }
}
