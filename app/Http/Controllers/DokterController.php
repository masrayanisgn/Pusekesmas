<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // method untuk menampilkan 
    public function index()
    {
        $dokters = dokter::all();
        
        return view('admin.dokter.index', [
            'dokters' => $dokters
        ]);
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
       // insert data ke table dokters
        dokter::create([
            // field di table => nilai yang ingin di isi
            'nama' => $request->nama,
            'spesialis' => $request->spesialis,
            'tgl_lahir' =>$request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' =>$request->telp
        ]);

        return redirect('/dokter');
    }
}