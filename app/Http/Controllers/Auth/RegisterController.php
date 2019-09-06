<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Login;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'nohp' => ['required', 'string', 'max:255'],
            'fotoktp' => ['required','file', 'image', 'max:2048'],
            'fototerbaru' => ['required','file', 'image', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$link_ktp = $this->upload_image($request,'photos','fotoktp');
        //$link_terbaru = $this->upload_image($request,'photos','fototerbaru');
        $hasil_user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'notelp' => $data['nohp'],
            'alamat' => $data['alamat'],
            'fotoktp' => $data['fotoktp'],
            'fototerbaru' => $data['fototerbaru'],
            'password' => Hash::make($data['password']),
        ]);
        #var_dump($hasil);
        $hasil = User::where('email',$data['email'])->first();
        Login::create([
            'users_id' => $hasil['id'],
            'roles_id' => 2,
        ]);
        return $hasil_user;
    }
}
