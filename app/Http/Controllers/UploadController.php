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
        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $filename = date('Y-m-d H:i:s').'_'.$f->getClientOriginalName();
                $f->move(storage_path('files'), $filename);
            }
        }
//        $msg"Файл завантажено";
    }
}
