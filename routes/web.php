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

Route::middleware('auth')->group(function (){
    Route::get('upload',['as' => 'upload_form', 'uses' => 'UploadController@getForm']);
    Route::post('upload',['as' => 'upload_file','uses' => 'UploadController@uploadFiles']);
    Route::get('show', ['as' => 'show_file', 'uses' => 'UploadController@getFiles']);
    Route::get('download/{filename}', ['as' => 'download_file', 'uses' => 'UploadController@downloadFile']);
    Route::get('remove/{filename}', ['uses' => 'UploadController@removeFile']);
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function () {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('dashboard_users', 'DashboardController@dashboardUsers')->name('dashboard_users');
    Route::post('manual_reg', 'DashboardController@manualRegistration')->name('manual_reg');
    Route::get('delete_user/{user}', 'DashboardController@deleteUser')->name('delete_user');
});

Auth::routes();

//!!! Routes install_admin, Install\InstallController and auth/install.blade will be remove after setup Administrator
Route::get('install_admin', 'Install\InstallController@showInstallForm')->name('install_admin');
Route::post('install_admin', 'Install\InstallController@register')->name('install_admin');
//!!!
