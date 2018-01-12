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
    return view('welcome');
});

Route::get('upload',['as' => 'upload_form', 'uses' => 'UploadController@getFiles']);
Route::post('upload',['as' => 'upload_file','uses' => 'UploadController@uploadFiles']);

Route::get('download/{filename}', function($filename)
{
    $file = storage_path('files') . '/' . $filename; // or wherever you have stored your PDF files
    return response()->download($file);
});