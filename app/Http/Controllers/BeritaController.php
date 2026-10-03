<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita dengan filter & pagination.
     */
    public function index(Request $request)
    {
        $beritas = Berita::query()
            ->when($request->kata_kunci, function ($q, $kata) {
                $q->where('judul', 'like', "%{$kata}%");
            })
            ->when($request->kategori, function ($q, $kategori) {
                $q->where('kategori', $kategori);
            })
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('berita.index', compact('beritas'));
    }

    /**
     * Menyimpan berita baru + Upload Gambar.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'isi'      => 'required|string|min:10',
        ]);

        // Process Upload Gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Memperbarui berita + Ganti Gambar.
     */
    public function update(Request $request, Berita $berita)
    {
        $validator = Validator::make($request->all(), [
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'isi'      => 'required|string|min:10',
        ]);

        // Jika validasi gagal, kembalikan session flag untuk membuka Modal Edit secara otomatis
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('is_edit_error', $berita->id);
        }

        $data = $validator->validated();

        // Process Ganti Gambar jika ada upload file baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada di storage
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus berita + Hapus Gambar dari storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus file gambar dari storage jika ada
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}