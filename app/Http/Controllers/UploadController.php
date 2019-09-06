<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function upload_image($data,$tujuan,$name)
    {
        //$tujuan_upload = $tujuan;
        $file = $data->file($name);
        $file->move($tujuan, $file->getClientOriginalName());
        return $tujuan."/".$file->getClientOriginalName();
    }
}
