<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dosen;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
        {
            $search = $request->search;

            $dataDosen = Dosen::when($search, function ($query, $search) {
                    return $query->where('nidn', 'like', "%{$search}%")
                                ->orWhere('nama', 'like', "%{$search}%");
                })
                ->orderBy('nidn', 'asc')
                ->paginate(5)
                ->withQueryString();

            return view('dosen.dosen', compact('dataDosen'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dosen.form-dosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // dd($request->nidn);
        $validated = $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama' => 'required',
        ]);
        // $validated['nidn'] = 1;
        Dosen::create($validated);
        return redirect()->route('dosen')->with('success', 'Data berhasil ditambah');
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
        $dataDosen = Dosen::findOrFail($id);        

        return view('dosen.detail-dosen', compact('dataDosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nidn)
    {
        $dataDosen = Dosen::where('nidn', $nidn)->firstOrFail();
        return view('dosen.form-edit-dosen', compact('dataDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nidn)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);

        Dosen::where('nidn', $nidn)->update($validated);
        return redirect()->route('dosen')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nidn)
    {
        Dosen::where('nidn', $nidn)->delete();

        return redirect()->route('dosen')
                ->with('delete', 'Data berhasil dihapus');
    }
}
