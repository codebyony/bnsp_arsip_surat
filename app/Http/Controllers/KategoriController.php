<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori.index', [
            'judul' => 'Daftar Kategori',
            'menu' => 'Kategori',
            'item' => Kategori::get(),
        ]);
    }

    public function cari(Request $request)
    {
        $item = Kategori::where('nama_kategori','LIKE','%'.$request->search.'%')->get();
        return view('kategori.index', [
            'judul' => 'Daftar Kategori - Cari Kategori',
            'menu' => 'Kategori',
            'item' => $item,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.tambah', [
            'judul' => 'Daftar Kategori - Tambah Kategori',
            'menu' => 'Kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        Kategori::create($validatedData); 
        return redirect('/kategori')->with('kategori_input_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('kategori.edit', [
            'judul' => 'Daftar Kategori - Edit Kategori',
            'menu' => 'Kategori',
            'item' => Kategori::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData=$request->validate([
            'id' => 'required',
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = Kategori::where('id', $id)->first();
        $kategori->id = $validatedData['id'];
        $kategori->nama_kategori = $validatedData['nama_kategori'];
        $kategori->keterangan = $validatedData['keterangan'];

    	$kategori->update();
        return redirect('/kategori')->with('kategori_edit_success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
    	return redirect('/kategori')->with('kategori_delete_success', 'Data berhasil dihapus'); 
    }
}
