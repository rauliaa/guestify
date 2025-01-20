<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use Illuminate\Validation\Rule;


class TamuController extends Controller
{
    // Menampilkan daftar tamu
    public function index()
    {
        $tamus = Tamu::all();
        return view('tamu.index', compact('tamus'));
    }

    // Menampilkan form tambah tamu
    public function create()
    {
        return view('tamu.create');
    }

    // Menyimpan data tamu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email|unique:tamus,email_tamu',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Tamu::create([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'nomor_telepon' => $request->nomor_telepon,
            'kode_unik' => $this->generateUniqueCode(),
        ]);

        return redirect()->route('tamu.index')->with('success', 'Tamu berhasil ditambahkan.');
    }

    // Menampilkan detail tamu
    public function show(Tamu $tamu)
    {
        return view('tamu.show', compact('tamu'));
    }

    // Menampilkan form edit tamu
    public function edit(Tamu $tamu)
    {
        return view('tamu.edit', compact('tamu'));
    }

    // Mengupdate data tamu
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_tamu' => 'required|max:255',
            'email_tamu' => [
                'required',
                'email',
                Rule::unique('tamus')->ignore($id, 'id_tamu'), // Menggunakan 'id_tamu' dan mengabaikan ID yang sedang diupdate
            ],
            'nomor_telepon' => 'required|max:255',
        ]);

        $tamu = Tamu::findOrFail($id);
        $tamu->update($validated);

        return redirect()->route('tamu.index')->with('success', 'Tamu berhasil diperbarui.');
    }

    // Menghapus tamu
    public function destroy(Tamu $tamu)
    {
        $tamu->delete();
        return redirect()->route('tamu.index')->with('success', 'Tamu berhasil dihapus.');
    }

    // Generate kode unik
    private function generateUniqueCode()
{
    do {
        $kode = strtoupper(substr(md5(uniqid()), 0, 6));
    } while (Tamu::where('kode_unik', $kode)->exists());

    return $kode;
}
}
