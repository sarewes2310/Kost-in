<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected function tampil_edit_profil()
    {
    	return view('user.edit_profile');
    }
}
