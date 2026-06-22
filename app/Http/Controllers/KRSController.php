<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\KRS;
use App\Models\Mahasiswa;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = KRS::query();

        // Mahasiswa hanya boleh lihat KRS miliknya sendiri
        if (Auth::user()->role === 'mahasiswa') {
            $query->where('npm', Auth::user()->npm);
        }

        $dataKRS = $query->when(request('search'), function ($query, $search) {
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
        if (Auth::user()->role === 'mahasiswa') {
            // Mahasiswa: NPM dikunci dari akun yang login, tidak bisa diisi manual
            $validated = $request->validate([
                'kode_matakuliah' => 'required',
            ]);
            $validated['npm'] = Auth::user()->npm;
        } else {
            // Admin: bebas tentukan NPM mahasiswa mana
            $validated = $request->validate([
                'npm' => 'required|numeric|exists:mahasiswa,npm'
            ]);
        }

        KRS::create($validated);
        return redirect()->route('krs')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataKRS = KRS::findOrFail($id);

        // Mahasiswa tidak boleh lihat detail KRS milik mahasiswa lain
        if (Auth::user()->role === 'mahasiswa' && $dataKRS->npm != Auth::user()->npm) {
            abort(403, 'Akses ditolak');
        }

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
            'npm' => 'required|numeric',
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
        $dataKRS = KRS::findOrFail($id);

        // Mahasiswa hanya boleh drop KRS miliknya sendiri
        if (Auth::user()->role === 'mahasiswa' && $dataKRS->npm != Auth::user()->npm) {
            abort(403, 'Akses ditolak');
        }

        $dataKRS->delete();

        return redirect()->route('krs')
            ->with('success', 'Data berhasil dihapus');
    }
}