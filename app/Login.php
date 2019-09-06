<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //Nama Tabel
    protected $table = 'login';
    //Nama Colom
    protected $fillable = ['users_id', 'roles_id'];
}
