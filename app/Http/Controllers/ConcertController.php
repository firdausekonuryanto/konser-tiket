<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index(Request $request)
    {
           $query = Concert::query();
    
    // Filter by search (title/location)
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', "%$search%")
              ->orWhere('lokasi', 'like', "%$search%");
        });
    }
    
    // Filter by category
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori', $request->kategori);
    }
    
    // Filter by date range
    if ($request->has('start_date') && $request->start_date != '') {
        $query->whereDate('waktu', '>=', $request->start_date);
    }
    
    if ($request->has('end_date') && $request->end_date != '') {
        $query->whereDate('waktu', '<=', $request->end_date);
    }
    
    // Get categories for filter dropdown
        $categories = Concert::distinct()->pluck('kategori');
        $concerts = $query->latest()->paginate(10);
      return view('concert.index', compact('concerts', 'categories'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('concert.create');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'artis' => 'required|string|max:255',
            'waktu' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'kuota' => 'required|integer|min:0',
            'kategori' => 'required|in:Festival,VIP,Presale',
            'gambar' => 'required|string|max:255',
        ]);

        Concert::create($validated);
        return redirect()->route('concert.index')->with('success', 'Konser berhasil ditambahkan.');
    }

    // Tampilkan detail konser
    public function show(Concert $concert)
    {
        return view('concert.show', compact('concert'));
    }

    // Tampilkan form edit konser
    public function edit(Concert $concert)
    {
        return view('concert.edit', compact('concert'));
    }

    // Update data konser
    public function update(Request $request, Concert $concert)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'artis' => 'required|string|max:255',
            'waktu' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'kuota' => 'required|integer|min:0',
            'kategori' => 'required|in:Festival,VIP,Presale',
            'gambar' => 'nullable',
        ]);

        $concert->update($validated);
        return redirect()->route('concert.index')->with('success', 'Konser berhasil diupdate.');
    }

    // Hapus konser
    public function destroy(Concert $concert)
    {
        $concert->delete();
        return redirect()->route('concert.index')->with('success', 'Konser berhasil dihapus.');
    }
}
