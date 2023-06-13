<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(){
        $dokters = Dokter::all();
        return view('admin.dokter.index', [
            'dokters' => $dokters
        ]
        );
    }

    public function create(){
        return view('admin.dokter.create');
    }

       public function store(Request $request){

        //Melakukan validasi data form
        $request->validate([
            'nama' => 'required | min:3' ,
            'spesialis' => 'required | min:2',
            'telp' => 'required | numeric | digits_between:10,14',
            'alamat' => 'required | max:500',
           
        ]);

            //insert data ke tabel dokters
            Dokter::create ([
    
        // field di table => nilai yang ingin diisi
        'nama' =>$request->nama,
        'spesialis' =>$request->spesialis,
        'telp' =>$request->telp,
        'alamat' =>$request->alamat,

       ]);
 
        return redirect('/dokter');
         
     }

      public function edit ($id){
        $dokter = Dokter::find($id);

        return view('admin.dokter.edit',[
            'dokter' => $dokter
        ]);
    }
//method untuk update dokter 
public function update($id, Request $request){
    //Melakukan validasi data form
    $validatedData = $request->validate([
        'nama' => 'required | min:3' ,
        'spesialis' => 'required | min:2',
        'telp' => 'required | numeric | digits_between:10,14',
        'alamat' => 'required | max:500',
    ]);

    // cari dokter yang akan di update
    $dokter = Dokter::find($id);

    //update pasien
    $dokter->update($validatedData);

    //Kembalikan ke halaman pasien
    return redirect('/dokter')->with('success', 'Data dokter berhasil diubah.');

}

//method untuk hapus dokter
public function destroy(Request $request){
    Dokter::destroy($request->id);

    //Kembalikan ke daftar Dokter
    return redirect('dokter') ->with('success', 'Data dokter berhasil di hapus');
}

}