<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hasil = Login::where('users_id', Auth::id())->first();
        if($hasil['roles_id'] == 1)
        {
            //return redirect('/');
        }
        else if($hasil['roles_id'] == 2)
        {
            //return view('user.home');
            //return view('user.home');
            $data = DB::table('kosts')->select(DB::raw('count(*) as jumlah_name'),DB::raw('sum(total_kamar) as jumlah_total_kamar'),DB::raw('(sum(total_kamar) - sum(kamar_terisi)) as jumlah_total_sisa_kamar'))->where('users_id', Auth::id())->get();
            //return $data;
        }
        return view('user.dashboard',['data' => $data]);
    }
}
