<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopsisController extends Controller
{
    //
    

    public function parsing_text_to_array($data)
    {
    	$hasil = [];   	
    	$text = "";
    	//$hasil = $value[2];
    	for ($i=0; $i < strlen($data); $i++) { 
    		if($data[$i] == ",")
    		{
    			array_push($hasil, $text);
    			$text = "";
    		}
    		else
    		{
    			$text .= $data[$i];
    		}	
    	}
    	return $hasil;
    }

    public function nilai_lokasi($data)
    {
    	$value = 0;
    	if($data > 4 && $data <= 6)
    	{
    		$value += 1;
    	}
    	else if($data > 2 && $data <= 4)
    	{
    		$value += 0.75;
    	}
    	else if($data > 0 && $data <= 2)
    	{
    		$value += 0.5;
    	}
    	else if($data == 0)
    	{
    		$value += 0;
    	}
    	return $value;
    }

    public function nilai_fasilitas($data)
    {
    	$value = 0;
    	if($data > 5 && $data <= 7)
    	{
    		$value += 1;
    	}
    	else if($data > 3 && $data <= 5)
    	{
    		$value += 0.75;
    	}
    	else if($data > 0 && $data <= 3)
    	{
    		$value += 0.5;
    	}
    	else if($data == 0)
    	{
    		$value += 0;
    	}
    	return $value;
    }

    public function nilai_sk($data)
    {
    	$value = 0;
    	if($data == 1)
    	{
    		$value += 1;
    	}
    	else if($data == 2)
    	{
    		$value += 0.75;
    	}
    	else if($data == 3)
    	{
    		$value += 0.5;	
    	}
    	else if($data == 4)
    	{
    		$value += 0.25;
    	}
    	return $value;
    }

    public function nilai_harga($data)
    {
    	$value = 0;
    	if($data > 6500000)
    	{
    		$value += 0.35;
    	}
    	else if( 5500000 <= $data && $data <= 6500000)
    	{
    		$value += 0.45;
    	}
    	else if( 4500000 <= $data && $data < 5500000)
    	{
    		$value += 0.55;
    	}
    	else if( 3500000 <= $data && $data < 4500000)
    	{
    		$value += 0.65;
    	}
    	else if( 2500000 <= $data && $data < 3500000)
    	{
    		$value += 0.75;
    	}
    	else if( 1500000 <= $data && $data < 2500000)
    	{
    		$value += 0.85;
    	}
    	else if( 0 <= $data && $data < 1500000)
    	{
    		$value += 1;
    	}
    	return $value;
    }

    public function convert_nilai_database($data,$cek)
    {
    	$values = 0;
    	foreach ($data as $key => $value) {
    		if($value == "tt" || $value == "mb" || $value == "lp" || $value == "kamarmd" || $value == "kamarml" || $value == "dapur" || $value == "rt" && $cek == "fasilitas"){
    			$values++;
    		}
    		else if($value == "kampus" || $value == "jalanraya" || $value == "tempatibadah" || $value == "temandaerah" || $value == "rumahmakan" || $value == "tempathiburan" && $cek == "lokasi")
    		{
    			$values++;
    		}
    	}
    	return $values;
    }
}
