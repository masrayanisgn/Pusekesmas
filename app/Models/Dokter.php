<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    public $table ='dokters';

    // menyebutkan field yang boleh diisi.
    protected $fillable =['nama','spesialis', 'tgl_lahir','alamat','telp'];

    protected $guarded = ['id'];
    

    // menghubungkan ke model pasien
    // 1 dokter dapat menangani banyak pasien
    public function pasien() {
        // karena dokter menitipkan id ke pasien,
        // maka dokter menghubungkan menggunakan has
        // kardinalitas 1 to M dari model ini ke model lain: hasmany
        // 1 to 1 ke model lain: hasOne
        return $this->hasMany(Pasien::class);
    }
}