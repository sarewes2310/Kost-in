<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    //Nama Tabel
    protected $table = 'kosts';
    //Nama Colom
    protected $fillable = ['sk_id', 'lokasi', 'users_id', 'foto_kosts_id', 'name', 'alamat', 'fasilitas', 'total_kamar', 'kamar_terisi', 'harga'];
}
