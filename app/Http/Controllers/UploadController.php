<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function getForm()
    {
        return view('upload-form');
    }

    function getFiles()
    {
        $disk = Storage::disk('files');
        $files = $disk->allFiles();
        $files_info = [];
        foreach ($files as $file) {
            $temp = [];
            $temp[] = $file;
            $temp[] = date('Y-m-d:H-i-s', $disk->lastModified($file));
            $temp[] = formatSizeUnits($disk->size($file));
            $files_info[] = $temp;
        }
        return view('file-list', ['files' => $files_info]);
    }

    function uploadFiles(Request $request)
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

    function removeFile ($filename)
    {
        $disk = Storage::disk('files');
        $disk->delete($filename);
        return redirect()->route('show_file');
    }
}
