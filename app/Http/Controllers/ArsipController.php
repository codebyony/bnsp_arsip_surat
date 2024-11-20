<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\Kategori;
use Carbon\Carbon;
use Str;
use Response;
use Storage;

class ArsipController extends Controller
{
    // HALAMAN ARSIP
    public function index()
    {
        return view('arsip.index', [
            'judul' => 'Daftar Arsip',
            'menu' => 'Arsip',
            'item' => Arsip::with('kategori')->get(),
        ]);
    }

    // FUNGSI SEARCH
    public function search(Request $request)
    {
        $item = Arsip::where('judul','LIKE','%'.$request->search.'%')->with('kategori')->get();
        return view('arsip.index', [
            'judul' => 'Daftar Arsip - Cari Arsip',
            'menu' => 'Arsip',
            'item' => $item,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('arsip.tambah', [
            'judul' => 'Daftar Arsip - Tambah Arsip',
            'menu' => 'Arsip',
            'kategori' => Kategori::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nomor_surat' => 'required',
            'id_kategori' => 'required',
            'judul' => 'required',
            'file_surat' => "required|mimes:pdf",
        ]);
        // Waktu Arsip
        $validatedData['waktu_pengarsipan'] = Carbon::now();    
        // Upload pdf 
        $file_surat = $request->file_surat;
        $nama = Str::random(12);
        $file_surat->move('uploads/', $nama.'.pdf');
        $validatedData['file_surat'] = 'uploads/'.$nama.'.pdf';

        Arsip::create($validatedData); 
        return redirect('/')->with('input_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('arsip.detail', [
            'judul' => 'Daftar Arsip - Detail Arsip',
            'menu' => 'Arsip',
            'item' => Arsip::where('nomor_surat', $id)->with('kategori')->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('arsip.edit', [
            'judul' => 'Daftar Arsip - Edit Arsip',
            'menu' => 'Arsip',
            'item' => Arsip::where('nomor_surat', $id)->with('kategori')->first(),
            'kategori' => Kategori::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validatedData=$request->validate([
        //     'nomor_surat' => 'required',
        //     'id_kategori' => 'required',
        //     'judul' => 'required',
        //     // 'file_surat' => "required|mimes:pdf",
        // ]);
        // Waktu Arsip
        $validatedData['waktu_pengarsipan'] = Carbon::now();
        $filename_old = Arsip::where('nomor_surat', $id)->pluck('file_surat');
        
        // Jika upload pdf
        if($request->file_surat != null){
            unlink(public_path().'\\'.str_replace('/', '\\', $filename_old[0]));
            
            $file_surat = $request->file_surat;
            $nama = Str::random(12);
            $file_surat->move('uploads/', $nama.'.pdf');
            $validatedData['file_surat'] = 'uploads/'.$nama.'.pdf';

        }else{
            $validatedData['file_surat'] = $filename_old[0];
        }

        $arsip = Arsip::where('nomor_surat', $id)->first();
        // $arsip->nomor_surat = $validatedData['nomor_surat'];
        // $arsip->judul = $validatedData['judul'];
        // $arsip->id_kategori = $validatedData['id_kategori'];
        $arsip->file_surat = $validatedData['file_surat'];
        $arsip->waktu_pengarsipan = $validatedData['waktu_pengarsipan'];

    	$arsip->update();

        // Arsip::create($validatedData); 
        return redirect('/'.$id)->with('edit_success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filename_old = Arsip::where('nomor_surat', $id)->pluck('file_surat');
        Arsip::destroy($id);
        unlink(public_path().'\\'.str_replace('/', '\\', $filename_old[0]));
    	return redirect('/')->with('delete_success', 'Data berhasil dihapus'); 
    }

    public function download(string $id){
        $data = Arsip::find($id);
        $file = public_path().'\\'.str_replace('/', '\\', $data->file_surat);
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'arsip.pdf', $headers);
    }
}
