<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
     // menghubungkan model ke table pasiens
     public $table ='pasiens';

     // menyebutkan field yang boleh diisi.
     protected $fillable =['nama','spesialis', 'tgl_lahir','alamat','telp'];
 }