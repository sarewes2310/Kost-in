<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$status = 0;
    return view('homepage_layout.cari',['status' => $status]);
})->name('homepage');

Route::get('/about', function () {
    return view('homepage_layout.about');
})->name('about');

Auth::routes();

Route::get('/cari_kost', 'KostController@cari_kost_utama')->name('cari_kost_utama');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/kost', 'KostController@index')->name('list_kost');
	Route::get('/kost_add', 'KostController@tampil_tambah_form')->name('tambah_kost');
	Route::post('/kost_add', 'KostController@simpan_tambah_form')->name('simpan_tambah_kost');
	Route::get('/kost_edit', 'KostController@tampil_edit_form')->name('edit_kost');
	Route::post('/kost_edit', 'KostController@simpan_edit_form')->name('simpan_edit_kost');
	Route::post('/kost_hapus', 'KostController@delete_form')->name('delete_kost');
	Route::post('/detail_kost', 'KostController@detail_kost')->name('detail_kost');
});

Route::get('/edit_profil', 'UserController@tampil_edit_profil')->name('edit_profil')->middleware('auth');