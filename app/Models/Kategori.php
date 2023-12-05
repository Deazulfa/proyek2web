<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Nama tabel yang sesuai dengan tabel di database
    protected $primaryKey = 'id_kategori'; // Ganti 'id_kategori' dengan nama kolom kunci primer yang digunakan
    protected $fillable = [
        'nama_kategori',
    ];

    // Jika Anda tidak ingin menggunakan timestamp (created_at dan updated_at), Anda bisa mengatur properti berikut
    public $timestamps = true; // Atau false, tergantung pada kebutuhan Anda

    // Atau, jika Anda memiliki kolom dengan tipe datetime di database dan ingin menggunakan Carbon untuk instance waktu
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
