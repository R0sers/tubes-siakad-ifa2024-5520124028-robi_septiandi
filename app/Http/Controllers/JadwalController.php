<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $search = request('search');

        $dataJadwal = Jadwal::with(['dosen', 'MataKuliah'])
        ->when($search, function ($query, $search) {
            return $query->where('id', 'like', "%{$search}%")
                        ->orWhereHas('MataKuliah', function ($q2) use ($search) {
                            $q2->where('kode_matakuliah', 'like', "%{$search}%");
                        })
                        ->orWhereHas('dosen', function ($q2) use ($search) {
                            $q2->where('nidn', 'like', "%{$search}%");
                        })
                        ->orWhere('hari', 'like', "%{$search}%")
                        ->orWhere('kelas', 'like', "%{$search}%");
        })
        ->orderBy('id', 'asc')
        ->paginate(7)
        ->withQueryString();

        return view('jadwal.jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.form-jadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|numeric|unique:jadwal',
            'kode_matakuliah' => 'required',
            'nidn' => 'required|numeric|exists:dosen,nidn',
            'kelas' => 'required',
            'hari' => 'required',
        ]);
        Jadwal::create($validated);
        return redirect()->route('jadwal')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                  //query db builder
        //$detailBuku = DB::table('buku')->where('id', $id)->firstOrFail();

        //orm
        // $detailBuku = Buku::find($id);
        $dataJadwal = Jadwal::findOrFail($id);        

        return view('jadwal.detail-jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataJadwal = Jadwal::where('id', $id)->firstOrFail();
        return view('jadwal.form-edit-jadwal', compact('dataJadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matakuliah' => 'required',
            'nidn' => 'required|numeric|exists:dosen,nidn',
            'kelas' => 'required',
            'hari' => 'required',
        ]);

        $dataJadwal = Jadwal::where('id', $id)->firstOrFail();
        $dataJadwal->update($validated);

        return redirect()->route('jadwal')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jadwal::where('id', $id)->delete();

        return redirect()->route('jadwal')
                ->with('success', 'Data berhasil dihapus');
    }
}
