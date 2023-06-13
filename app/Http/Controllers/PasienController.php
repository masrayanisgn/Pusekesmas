<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller{
    // method untuk menampilkan data semua pasien
    public function index()
    {
        $pasiens = Pasien::all();

        return view('admin.pasien.index', [
            'pasiens' => $pasiens
        ]);
    }

    public function create()
    {
        return view('admin.pasien.create');
    }
    // untuk menangani submit form tambah pasien 
    public function store(Request $request){
        // melakukan validasi data from 
        $request->validate([
            'nama' => 'required | min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required | date |',
            'alamat' => 'required | max:500',
            'telp' => 'required | numeric | digits_between:10,14',
        ]);
        // insert data ke table pasiens
        Pasien::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' =>$request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' =>$request->telp
        ]);

        return redirect('/pasien');
    }

    public function edit($id){
        // mendapatkan pasien berdasarkan id
        $pasien = Pasien::find($id);

        return view('admin.pasien.edit',[
            'pasien' => $pasien
        ]);
    }

    // method untuk update pasien
    public function update($id, Request $request){
     // melakukan validasi data from 
     $validatedData = $request->validate([
        'nama' => 'required | min:3',
        'jk' => 'required',
        'tgl_lahir' => 'required | date |',
        'alamat' => 'required | max:500',
        'telp' => 'required | numeric | digits_between:10,14',
    ]);

    // cari pasien yang akan di update 
    $pasien = Pasien::find($id);

    // update pasien berdasarkan data validasi
    $pasien->update($validatedData);

    // Kembalikan ke halaman daftar pasien
    return  redirect('/pasien')->with('success', 'Data pasien berhasil diubah');
     
} 

// method untuk hapus pasien
public function destroy(Request $request){

    // hapus pasien berdasarkan id
    Pasien::destroy($request->id); 

    // kembalikan ke halaman daftar pasien
    return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus.');
}
}