<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    function getForm()
    {
        return view('upload-form');
    }

    function upload (Request $request)
    {
        $messages=[];
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $originFilename = $f->getClientOriginalName();
                $filename = date('Y-m-d_H-i-s').'_'.$originFilename;
                $f->move(storage_path('files'), $filename);
                if(file_exists(storage_path('files/').$filename)) {
                    $messages[] = "Файл ".$originFilename. " завантажено";
                } else {
                    $messages[] = "Увага! Файл ".$originFilename. " НЕ завантажено!";
                }
            }
        }
        return view('upload-form', ['msg' => $messages]);
    }
}
