<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    
    public static function getAll(){
        return [
            ['nama' => 'Udin', 'JK' =>'L', 'tgl_Lahir'=> '12/06/2002', 'alamat' => 'Bogor','telp' => '082365025012'],
            ['nama' => 'Siti', 'JK' =>'P', 'tgl_Lahir'=> '23/12/2005', 'alamat' => 'Depok','telp' => '082365025012'],
            ['nama' => 'Ali', 'JK' =>'L', 'tgl_Lahir'=> '11/09/2002', 'alamat' => 'Jakarta','telp' => '082365025012'],
        ];
    }
}