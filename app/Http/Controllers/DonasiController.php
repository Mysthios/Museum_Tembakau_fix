<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $programDonasi = Donasi::all(); // Ambil semua data program donasi
        return view('program_donasi.index', compact('programDonasi'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:admins,admin_id',
            'judul' => 'required',
            'deskripsi' => 'required',
            'jumlah_target' => 'required|numeric',
            'jumlah_sekarang' => 'nullable|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status' => 'required|in:active,inactive',
            'gambar' => 'nullable',
        ]);

        $data['jumlah_sekarang'] = $data['jumlah_sekarang'] ?? 0; // Default nilai 0 jika kosong
        return Donasi::create($data);
    }

    public function show($id)
    {
        return Donasi::with('admin')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $program = Donasi::findOrFail($id);

        $data = $request->validate([
            'admin_id' => 'sometimes|exists:admins,admin_id',
            'judul' => 'sometimes',
            'deskripsi' => 'sometimes',
            'jumlah_target' => 'sometimes|numeric',
            'jumlah_sekarang' => 'nullable|numeric',
            'tanggal_mulai' => 'sometimes|date',
            'tanggal_selesai' => 'sometimes|date',
            'status' => 'sometimes|in:active,inactive',
            'gambar' => 'nullable',
        ]);

        $program->update($data);
        return $program;
    }

    public function destroy($id)
    {
        $program = Donasi::findOrFail($id);
        $program->delete();

        return response()->json(['message' => 'Program donasi deleted successfully']);
    }
}
