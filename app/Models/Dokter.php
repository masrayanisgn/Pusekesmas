<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    public static function getAll(){
        return [
            ['nama' => 'Fandi', 'JK' =>'L', 'sp'=> 'Jantung', 'alamat' => 'Bogor','telp' => '082365025012'],
            ['nama' => 'Yaya', 'JK' =>'P', 'sp'=> 'Gigi', 'alamat' => 'Depok','telp' => '0826789099'],
            ['nama' => 'Ali', 'JK' =>'L', 'sp'=> 'Paru-paru', 'alamat' => 'Jakarta','telp' => '082365u9790'],
        ];
    }

}