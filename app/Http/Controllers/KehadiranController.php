<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Tamu;
use Illuminate\Http\Request;
use App, Models\Users;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tamu $tamu)
    {
        //
        $tamu = Tamu::all();
        $kehadiran = Kehadiran::with('tamu')->get();
        return view('kehadiran.index', compact('tamu', 'kehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tamu = Tamu::all();
        $kehadiran = Kehadiran::all();
        return view('kehadiran.create', compact('tamu', 'kehadiran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_tamu' => 'required|exists:tamus,id_tamu',
            'acara' => 'required',
            'status_kehadiran' => 'required',
        ]);

        Kehadiran::create([
            'id_tamu' => $request->id_tamu,
            'acara' => $request->acara,
            'waktu_kehadiran' => Carbon::now(),
            'status_kehadiran' => $request->status_kehadiran,
        ]);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tamu = Tamu::all();
        $kehadiran = Kehadiran::with('tamu')->findOrFail($id);
        return view('kehadiran.show', compact('tamu', 'kehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tamu = Tamu::all();
        $kehadiran = Kehadiran::findOrFail($id);
        return view('kehadiran.edit', compact('tamu', 'kehadiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $kehadiran = Kehadiran::findOrFail($id);
        $request->validate([
            'id_tamu' => 'required',
            'acara' => 'required',
            'status_kehadiran' => 'required',
        ]);

        $kehadiran->update([
            'id_tamu' => $request->id_tamu,
            'acara' => $request->acara,
            'waktu_kehadiran' => Carbon::now('Asia/Jakarta'),
            'status_kehadiran' => $request->status_kehadiran,
        ]);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil dihapus.');
    }
}
