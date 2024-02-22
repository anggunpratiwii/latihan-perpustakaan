<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Kategoribukurelasi;
use Illuminate\Http\Request;
class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategoribukurelasi::all();
        return view('buku.buku', compact('buku', 'kategori'));
    }

    public function create()
    {
        
        $kategori = Kategori::distinct()->get();
        return view('buku.buku_create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'kategori_id' => 'required',
        ]);

        // Cari kategori berdasarkan ID
        $kategori = Kategori::find($request->kategori_id);

        //Tambah buku baru beserta kategori
        $buku = Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        $buku->kategori()->attach($kategori);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }
    public function edit($id){
        $buku = Buku::findOrFail($id);
        return view ('buku.buku_edit', ['buku'=>$buku]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama_buku'=>'required',
        ]);
        Kategori::find($id)->update([
            'nama_buku'=>$request->nama_buku,
        ]);
        return redirect('/buku');
    }
    public function destroy($id){
        // Buku::find($id)->destroy();
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}

