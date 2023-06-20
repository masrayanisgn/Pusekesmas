<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    // method untuk menampilkan 
    public function index()
    {
        $pasiens = Pasien::all();
        return view('Admin.pasien.index', [
            'pasiens' => $pasiens
        ]);
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('Admin.pasien.create', [
            'dokters' => $dokters
        ]);
    }

    public function store(Request $request)
    {
        // Melakukan validasi data form
        $request->validate([
            'nama' => 'required | min:3',
            'jk' => 'required ',
            'tgl_lahir' => 'required | date',
            'alamat' => 'required|max:500',
            'telp' => 'required|numeric|digits_between:10,14',
            'dokter_id' => 'required',
        ]);

        // insert data ke table pasiens 
        Pasien::create([
            // field di table => nilai yang ingin di isi
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'dokter_id' => $request->dokter_id
        ]);
        return redirect('/pasien');
    }
    public function edit($id)
    {
        // mendapatkan pasien berdasarkan id
        $pasien = Pasien::find($id);

        $dokters = Dokter::all();


        return view('Admin.pasien.edit', [
            'pasien' => $pasien,
            'dokters' => $dokters,

        ]);
    }

    // method untuk update pasien 
    public function update($id, Request $request)
    {
        // Melakukan validasi data form
        $validatedData = $request->validate([
            'nama' => 'required',
            'jk' => 'required ',
            'tgl_lahir' => 'required | date',
            'alamat' => 'required|max:500',
            'telp' => 'required|numeric|digits_between:10,14',
            'dokter_id' => 'required',
        ]);

        // cari pasien yang akan di update
        $pasien = pasien::find($id);

        // update pasien
        $pasien->update($validatedData);



        //kembalikan ke halaman daftar pasien 
        return redirect('/pasien')->with('success', 'Data pasien berhasil di ubah');
    }

    // method untuk hapus pasien
    public function destroy(Request $request)
    {
        pasien::destroy($request->id);

        // kembalikan kehalaman daftar pasien
        return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus');
    }
}