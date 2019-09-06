<?php

namespace App\Http\Controllers;

use App\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
    	$data = Kost::where('users_id', Auth::id())->paginate(10);
    	return view('user.kost',['data' => $data]);
    }

    protected function tampil_tambah_form()
    {
    	return view('user.kost_layout.add');
    }

    protected function tampil_edit_form(request $request)
    {
    	$hasil = $request->all();
    	$data = Kost::where('kosts_id', $hasil['info_kosts'])->first();
    	//return app('App\Http\Controllers\TopsisController')->parsing_text_to_array($data['lokasi']);
    	return view('user.kost_layout.edit',['data' => $data,'fasilitas' => app('App\Http\Controllers\TopsisController')->parsing_text_to_array($data['fasilitas']), 
    		'lokasi' => app('App\Http\Controllers\TopsisController')->parsing_text_to_array($data['lokasi'])]);
    }

    protected function validation_kost($request)
    {
    	$validatedData = $request->validate([
	        'name' => 'required|string|max:255',
	        'tk' => 'required|string|max:255',
	        'kt' => 'required|string|max:255',
	        'harga' => 'required|string|max:255',
	        'sk' => 'required|not_in:0',
	        'alamat' => 'required|string|max:255',
	        'fotokost' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
	    ]);
    }

    protected function simpan_tambah_form(request $request)
    {
    	$hasil = $request->all();
    	$validatedData = $request->validate([
	        'name' => 'required|string|max:255',
	        'tk' => 'required|string|max:255',
	        'kt' => 'required|string|max:255',
	        'harga' => 'required|string|max:255',
	        'sk' => 'required|not_in:0',
	        'alamat' => 'required|string|max:255',
	        'fotokost' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
	    ]);
	    $cek_ck = $this->cek_checkbox($hasil);
	    //return $hasil['sk'];
	    //return $cek_ck;
	    Kost::create([
	    	'name' => $hasil['name'],
	    	'alamat' => $hasil['alamat'],
	    	'total_kamar' => $hasil['tk'],
	    	'users_id' => Auth::id(),
	    	'kamar_terisi' => $hasil['kt'],
	    	'harga' => $hasil['harga'],
	    	'fasilitas' => $cek_ck['fasilitas'],
	    	'lokasi' => $cek_ck['lokasi'],
	    	'sk_id' => $hasil['sk'],
	    	'foto_kosts_id' => app('App\Http\Controllers\UploadController')->upload_image($request, 'photos', 'fotokost'),
	    ]);
	    return redirect('/kost');
    	//return view('user.kost_layout.add');
    }
    protected function cek_checkbox($hasil)
    {
    	$text = [];
    	$text['fasilitas'] = "";
    	$text['lokasi'] = "";
    	$no_h = 1;
    	$no_l = 1;
    	foreach ($hasil as $key => $value) {
    		if($key == "tt" || $key == "mb" || $key == "lp" || $key == "kamarmd" || $key == "kamarml" || $key == "dapur" || $key == "rt"){
    			$text['fasilitas'] .= $key;
    			if($no_h <= 6)$text['fasilitas'] .=",";
    			$no_h++;
    		}
    		else if($key == "kampus" || $key == "jalanraya" || $key == "tempatibadah" || $key == "temandaerah" || $key == "rumahmakan" || $key == "tempathiburan")
    		{
    			$text['lokasi'] .= $key;
    			if($no_l <= 5)$text['lokasi'] .=",";
    			$no_l++;
    		}
    	}
    	return $text;
    }

    protected function cek_checkbox_calc($hasil)
    {
    	$text = [];
    	$text['fasilitas'] = 0;
    	$text['lokasi'] = 0;
    	foreach ($hasil as $key => $value) {
    		if($key == "tt" || $key == "mb" || $key == "lp" || $key == "kamarmd" || $key == "kamarml" || $key == "dapur" || $key == "rt"){
    			$text['fasilitas']++;
    		}
    		else if($key == "kampus" || $key == "jalanraya" || $key == "tempatibadah" || $key == "temandaerah" || $key == "rumahmakan" || $key == "tempathiburan")
    		{
    			$text['lokasi']++;
    		}
    	}
    	return $text;
    }

    protected function simpan_edit_form(request $request)
    {
    	$hasil = $request->all();
    	$validatedData = $request->validate([
	        'name' => 'required|string|max:255',
	        'tk' => 'required|string|max:255',
	        'kt' => 'required|string|max:255',
	        'harga' => 'required|string|max:255',
	        'sk' => 'required|not_in:0',
	        'alamat' => 'required|string|max:255',
	        'fotokost' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
	    ]);
	    $cek_ck = $this->cek_checkbox($hasil);
	    //return $hasil['sk'];
	    //return $cek_ck;
	    Kost::where('kosts_id', $hasil['kosts_id'])->update([
	    	'name' => $hasil['name'],
	    	'alamat' => $hasil['alamat'],
	    	'total_kamar' => $hasil['tk'],
	    	'users_id' => Auth::id(),
	    	'kamar_terisi' => $hasil['kt'],
	    	'harga' => $hasil['harga'],
	    	'fasilitas' => $cek_ck['fasilitas'],
	    	'lokasi' => $cek_ck['lokasi'],
	    	'sk_id' => $hasil['sk'],
	    	'foto_kosts_id' => app('App\Http\Controllers\UploadController')->upload_image($request, 'photos', 'fotokost'),
	    ]);
	    return redirect('/kost');
    }

    protected function delete_form(request $request)
    {
    	$hasil = $request->all();
    	Kost::where('kosts_id', $hasil['info_kosts'])->delete();
    	return redirect('/kost');
    }

    protected function detail_kost(request $request)
    {	
    	$hasil = $request->all();
    	$data = Kost::where('kosts_id', $hasil['info_kosts'])->first();
    	return $data;
    	//return view('user.kost_layout.info',['data' => $data]);
    }

    public function cari_kost_utama(request $request)
    {
        $data = $request->all();
        if($data['name'] == null)
        {
        	$no = 0;
        	$hasil = Kost::all();
        	foreach ($hasil as $key => $value) {
        		$hasil[$key]->harga_prefix = $hasil[$key]->harga;
        	}
        	//return $hasil;
        	$new_hasil = [];
        	$new_data = $this->cek_checkbox_calc($data);
        	$new_data['fasilitas'] = app('App\Http\Controllers\TopsisController')->nilai_fasilitas($new_data['fasilitas']);
        	$new_data['lokasi'] = app('App\Http\Controllers\TopsisController')->nilai_lokasi($new_data['lokasi']);
        	$new_data['harga'] = app('App\Http\Controllers\TopsisController')->nilai_harga($data['harga']);
        	$new_data['sk'] = app('App\Http\Controllers\TopsisController')->nilai_sk($data['sk']);

        	$tmp_total_lokasi = pow($new_data['lokasi'],2);
        	$tmp_total_fasilitas = pow($new_data['fasilitas'],2);
        	$tmp_total_harga = pow($new_data['harga'],2);
        	$tmp_total_sk = pow($new_data['sk'],2);
        	//var_dump($new_data);`
        	foreach ($hasil as $key => $value) {
        		$text_array = app('App\Http\Controllers\TopsisController')->parsing_text_to_array($value->lokasi);
        		$nilai = app('App\Http\Controllers\TopsisController')->convert_nilai_database($text_array,"lokasi");
        		$nilai = app('App\Http\Controllers\TopsisController')->nilai_lokasi($nilai);
        		$hasil[$key]->lokasi = $nilai;
        		$tmp_total_lokasi += pow($hasil[$key]->lokasi,2);
        		$text_array = app('App\Http\Controllers\TopsisController')->parsing_text_to_array($value->fasilitas);
        		$nilai = app('App\Http\Controllers\TopsisController')->convert_nilai_database($text_array,"fasilitas");
        		$nilai = app('App\Http\Controllers\TopsisController')->nilai_fasilitas($nilai);
        		$hasil[$key]->fasilitas = $nilai;
        		$tmp_total_fasilitas += pow($hasil[$key]->fasilitas,2);
        		$nilai = app('App\Http\Controllers\TopsisController')->nilai_harga($value->harga);
        		$hasil[$key]->harga = $nilai;
        		$tmp_total_harga += pow($hasil[$key]->harga,2);
        		$nilai = app('App\Http\Controllers\TopsisController')->nilai_sk($value->sk_id);
        		$hasil[$key]->sk_id = $nilai;
        		$tmp_total_sk += pow($hasil[$key]->sk_id,2);
        		//var_dump($nilai);
        	}

        	$tmp_total_lokasi = sqrt($tmp_total_lokasi);
        	$tmp_total_fasilitas = sqrt($tmp_total_fasilitas);
        	$tmp_total_harga = sqrt($tmp_total_harga);
        	$tmp_total_sk = sqrt($tmp_total_sk);
        	$bobot_kriteria = [0.8, 0.7, 0.5, 0.4];

        	foreach ($hasil as $key => $value) {
        		$hasil[$key]->lokasi = ($hasil[$key]->lokasi / $tmp_total_lokasi) * $bobot_kriteria[0];
        		$hasil[$key]->fasilitas = ($hasil[$key]->fasilitas / $tmp_total_fasilitas) * $bobot_kriteria[1];
        		$hasil[$key]->harga = ($hasil[$key]->harga / $tmp_total_harga) * $bobot_kriteria[3];
        		$hasil[$key]->sk = ($hasil[$key]->sk / $tmp_total_sk) * $bobot_kriteria[2];
        		//var_dump($nilai);
        	}

        	$new_data['lokasi'] = ($new_data['lokasi'] / $tmp_total_lokasi) * $bobot_kriteria[0];
        	$new_data['fasilitas'] = ($new_data['fasilitas'] / $tmp_total_fasilitas) * $bobot_kriteria[1];
        	$new_data['harga'] = ($new_data['harga'] / $tmp_total_harga) * $bobot_kriteria[3];
        	$new_data['sk'] = ($new_data['sk'] / $tmp_total_sk) * $bobot_kriteria[2];

        	$matrix_normalisasi_lokasi['plus'] = 0;
        	$matrix_normalisasi_lokasi['minus'] = 1;
        	$matrix_normalisasi_fasilitas['plus'] = 0;
        	$matrix_normalisasi_fasilitas['minus'] = 1;
        	$matrix_normalisasi_harga['plus'] = 0;
        	$matrix_normalisasi_harga['minus'] = 1;
        	$matrix_normalisasi_sk['plus'] = 0;
        	$matrix_normalisasi_sk['minus'] = 1;

        	foreach ($hasil as $key => $value) {
        		if($hasil[$key]->lokasi > $matrix_normalisasi_lokasi['plus'])
        		{
        			$matrix_normalisasi_lokasi['plus'] = $hasil[$key]->lokasi;
        		}
        		if($hasil[$key]->lokasi < $matrix_normalisasi_lokasi['minus'])
        		{
        			$matrix_normalisasi_lokasi['minus'] = $hasil[$key]->lokasi;
        		}
        		if($hasil[$key]->fasilitas > $matrix_normalisasi_fasilitas['plus'])
        		{
        			$matrix_normalisasi_fasilitas['plus'] = $hasil[$key]->fasilitas;
        		}
        		if($hasil[$key]->fasilitas < $matrix_normalisasi_fasilitas['minus'])
        		{
        			$matrix_normalisasi_fasilitas['minus'] = $hasil[$key]->fasilitas;
        		}
        		if($hasil[$key]->harga > $matrix_normalisasi_harga['plus'])
        		{
        			$matrix_normalisasi_harga['plus'] = $hasil[$key]->harga;
        		}
        		if($hasil[$key]->harga < $matrix_normalisasi_harga['minus'])
        		{
        			$matrix_normalisasi_harga['minus'] = $hasil[$key]->harga;
        		}
        		if($hasil[$key]->sk > $matrix_normalisasi_sk['plus'])
        		{
        			$matrix_normalisasi_sk['plus'] = $hasil[$key]->sk;
        		}
        		if($hasil[$key]->sk < $matrix_normalisasi_sk['minus'])
        		{
        			$matrix_normalisasi_sk['minus'] = $hasil[$key]->sk;
        		}
        		//var_dump($nilai);
        	}
        	if($new_data['lokasi'] > $matrix_normalisasi_lokasi['plus'])$matrix_normalisasi_lokasi['plus'] = $new_data['lokasi'];
        	if($new_data['lokasi'] < $matrix_normalisasi_lokasi['minus'])$matrix_normalisasi_lokasi['minus'] = $new_data['lokasi'];
        	if($new_data['fasilitas'] > $matrix_normalisasi_fasilitas['plus'])$matrix_normalisasi_fasilitas['plus'] = $new_data['fasilitas'];
        	if($new_data['fasilitas'] < $matrix_normalisasi_fasilitas['minus'])$matrix_normalisasi_fasilitas['minus'] = $new_data['fasilitas'];
        	if($new_data['harga'] > $matrix_normalisasi_harga['plus'])$matrix_normalisasi_harga['plus'] = $new_data['harga'];
        	if($new_data['harga'] < $matrix_normalisasi_harga['minus'])$matrix_normalisasi_harga['minus'] = $new_data['harga'];
        	if($new_data['sk'] > $matrix_normalisasi_sk['plus'])$matrix_normalisasi_sk['plus'] = $new_data['sk'];
        	if($new_data['sk'] < $matrix_normalisasi_sk['minus'])$matrix_normalisasi_sk['minus'] = $new_data['sk'];

        	$tabel_positif = $hasil;
        	$new_data_positif = $new_data;
        	$new_data_positif['lokasi'] = pow($matrix_normalisasi_lokasi['plus']-$new_data_positif['lokasi'],2);
        	$new_data_positif['fasilitas'] = pow($matrix_normalisasi_fasilitas['plus']-$new_data_positif['fasilitas'],2);
        	$new_data_positif['harga'] = pow($matrix_normalisasi_harga['plus']-$new_data_positif['harga'],2);
        	$new_data_positif['sk'] = pow($matrix_normalisasi_sk['plus']-$new_data_positif['sk'],2);

        	foreach ($tabel_positif as $key => $value) {
        		$tabel_positif[$key]->lokasi = pow($matrix_normalisasi_lokasi['plus'] - $tabel_positif[$key]->lokasi,2);
        		$tabel_positif[$key]->fasilitas = pow($matrix_normalisasi_fasilitas['plus']-$tabel_positif[$key]->fasilitas,2);
        		$tabel_positif[$key]->harga = pow($matrix_normalisasi_harga['plus']-$tabel_positif[$key]->harga,2);
        		$tabel_positif[$key]->sk = pow($matrix_normalisasi_sk['plus']-$tabel_positif[$key]->sk,2);
        		//var_dump($nilai);
        	}
        	
        	foreach ($tabel_positif as $key => $value) {
        		$hasil[$key]->positif = sqrt($tabel_positif[$key]->lokasi + $tabel_positif[$key]->fasilitas + $tabel_positif[$key]->harga + $tabel_positif[$key]->sk);
        	}
        	$new_data['positif'] = sqrt($new_data_positif['lokasi']+$new_data_positif['fasilitas']+$new_data_positif['harga']+$new_data_positif['sk']);

        	$tabel_negatif = $hasil;
        	$new_data_negatif = $new_data;
        	$new_data_negatif['lokasi'] = pow($matrix_normalisasi_lokasi['minus']-$new_data_negatif['lokasi'],2);
        	$new_data_negatif['fasilitas'] = pow($matrix_normalisasi_fasilitas['minus']-$new_data_negatif['fasilitas'],2);
        	$new_data_negatif['harga'] = pow($matrix_normalisasi_harga['minus']-$new_data_negatif['harga'],2);
        	$new_data_negatif['sk'] = pow($matrix_normalisasi_sk['minus']-$new_data_negatif['sk'],2);

        	foreach ($tabel_positif as $key => $value) {
        		$tabel_negatif[$key]->lokasi = pow($matrix_normalisasi_lokasi['minus'] - $tabel_negatif[$key]->lokasi,2);
        		$tabel_negatif[$key]->fasilitas = pow($matrix_normalisasi_fasilitas['minus']-$tabel_negatif[$key]->fasilitas,2);
        		$tabel_negatif[$key]->harga = pow($matrix_normalisasi_harga['minus']-$tabel_negatif[$key]->harga,2);
        		$tabel_negatif[$key]->sk = pow($matrix_normalisasi_sk['minus']-$tabel_negatif[$key]->sk,2);
        		//var_dump($nilai);
        	}

        	foreach ($tabel_positif as $key => $value) 
        	{
        		$hasil[$key]->negatif = sqrt($tabel_negatif[$key]->lokasi + $tabel_negatif[$key]->fasilitas + $tabel_negatif[$key]->harga + $tabel_negatif[$key]->sk);
        	}
        	$new_data['negatif'] = sqrt($new_data_negatif['lokasi']+$new_data_negatif['fasilitas']+$new_data_negatif['harga']+$new_data_negatif['sk']);
        	
        	foreach ($hasil as $key => $value) 
        	{
        		$hasil[$key]->preferensi = 	$hasil[$key]->negatif / ($hasil[$key]->negatif + $hasil[$key]->positif);
        	}
        	$new_data['preferensi'] = $new_data['negatif'] / ($new_data['negatif']+$new_data['positif']);

        	foreach ($hasil as $key => $value) 
        	{
        		foreach ($hasil as $keys => $values) 
        		{
        			if($hasil[$key]->preferensi > $hasil[$keys]->preferensi)
        			{
        				$tmp = $hasil[$keys];
        				$hasil[$keys] = $hasil[$key];
        				$hasil[$key] = $tmp; 
        			}	
        		}
        	}
        	//return $hasil;
        	foreach ($hasil as $key => $value) 
        	{
				if($hasil[$key]->preferensi >= $new_data['preferensi'])array_push($new_hasil, $hasil[$key]);
        	}
        	//return $new_hasil;
        	return view('homepage_layout.cari',['data' => $new_hasil, 'status' => 1]);
        	//var_dump($hasil[0]['lokasi']);
        }
        else
        {
        	return Kost::where('name',$data['name'])->all();
        } 
    }
}
