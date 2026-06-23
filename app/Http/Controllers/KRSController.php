<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Exports\KRSExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;



class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $query = Mahasiswa::query();

        if (Auth::user()->role === 'mahasiswa') {
            $query->where('npm', Auth::user()->npm);
        }

        $dataKRS = $query->when(request('search'), function ($query, $search) {
            return $query->where('npm', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%");
        })
            ->orderBy('npm', 'asc')
            ->paginate(15)
            ->withQueryString();

        return view('krs.krs', compact('dataKRS'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            $dataJadwal = Jadwal::with(['dosen', 'matakuliah'])->orderBy('kode_matakuliah')->get();

            $npm = request('npm');
            $dataMahasiswa = null;

            if ($npm) {
                $dataMahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

                // Kalau yang login mahasiswa, dia hanya boleh akses NPM dirinya sendiri
                if (Auth::user()->role === 'mahasiswa' && $npm != Auth::user()->npm) {
                    abort(403, 'Akses ditolak');
                }
            }

            return view('krs.form-krs', compact('dataJadwal', 'dataMahasiswa'));
        }
    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            if (Auth::user()->role === 'mahasiswa') {
                $validated = $request->validate([
                    'jadwal_id' => 'required|exists:jadwal,id',
                ]);
                $validated['npm'] = Auth::user()->npm;
            } else {
                $validated = $request->validate([
                    'npm'       => 'required|numeric|exists:mahasiswa,npm',
                    'jadwal_id' => 'required|exists:jadwal,id',
                ]);
            }

            $jadwal = Jadwal::findOrFail($validated['jadwal_id']);
            $validated['kode_matakuliah'] = $jadwal->kode_matakuliah;

            KRS::create($validated);

            return redirect()->route('detail-krs', ['id' => $validated['npm']])
                ->with('success', 'Data berhasil ditambah');
        }

    /**
     * Display the specified resource.
     */
        public function show(string $npm)
        {
            $dataMahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

   
            if (Auth::user()->role === 'mahasiswa' && $dataMahasiswa->npm != Auth::user()->npm) {
                abort(403, 'Akses ditolak');
            }

            $dataKRS = KRS::with('jadwal.dosen', 'jadwal.matakuliah')
            ->where('npm', $npm)
            ->get();

            return view('krs.detail-krs', compact('dataMahasiswa', 'dataKRS'));
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

            public function exportPdf(string $npm)
        {
            $dataMahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

            if (Auth::user()->role === 'mahasiswa' && $npm != Auth::user()->npm) {
                abort(403, 'Akses ditolak');
            }

            $dataKRS = KRS::with('jadwal.dosen', 'jadwal.matakuliah')
                ->where('npm', $npm)
                ->get();

            $pdf = Pdf::loadView('krs.pdf', compact('dataMahasiswa', 'dataKRS'));

            return $pdf->download('KRS_' . $npm . '.pdf');
        }

        public function exportExcel(string $npm)
        {
            $dataMahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

            if (Auth::user()->role === 'mahasiswa' && $npm != Auth::user()->npm) {
                abort(403, 'Akses ditolak');
            }

            return Excel::download(new KRSExport($npm), 'KRS_' . $npm . '.xlsx');
        }
}