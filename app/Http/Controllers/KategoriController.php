<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Kategoribukurelasi;

class KategoriController extends Controller
{
    public function index(){
        $kategori = kategori::all();
        return view ('buku.kategori',['kategori'=>$kategori]);
    }
}
