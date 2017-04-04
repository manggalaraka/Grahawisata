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

Auth::routes();

Route::get('/','Auth\LoginController@index');
// Route::get('/formlogin','Auth\LoginController@index');

Route::get('/login',function(){
	return redirect('/');
});

Route::get('/','Auth\LoginController@index');




Route::get('/home', 'HomeController@index');

// -------------------------  Fasilitas ---------------------------------//
Route::get('/home/daftar_fasilitas', 'HomeController@daftar_fasilitas');
Route::post('/home/daftar_fasilitas', 'HomeController@daftar_fasilitas');
Route::post('/get_fasilitas','Administrator\C_Fasilitas@ajax_get_fasilitas_by_id');
Route::post('/add_fasilitas','Administrator\C_Fasilitas@add');
Route::post('/update_fasilitas','Administrator\C_Fasilitas@update');
Route::post('/delete_fasilitas','Administrator\C_Fasilitas@delete');
//--------------------------- Fasilitas ---------------------------------//


//--------------------------- Kelas ---------------------------------//
Route::get('/home/daftar_kelas', 'HomeController@daftar_kelas');
Route::post('/home/daftar_kelas', 'HomeController@daftar_kelas');
Route::get('/home/tambah_kelas', 'HomeController@tambah_kelas');
Route::get('/home/edit_kelas/{id_kelas}', 'HomeController@edit_kelas');
Route::post('/home/add_kelas', 'Administrator\C_Kelas@add');
Route::post('/home/edit_kelas/{id_kelas}', 'Administrator\C_Kelas@update');
Route::post('/add_kamar','Administrator\C_Kamar@add');
//--------------------------- Kelas ---------------------------------//


//--------------------------- Promo ---------------------------------//
Route::get('/home/daftar_promo', 'HomeController@daftar_promo');
Route::post('/home/daftar_promo', 'HomeController@daftar_promo');
Route::post('/home/tambah_promo', 'Administrator\C_promo@add');
Route::post('/delete_promo','Administrator\C_promo@delete');
//--------------------------- Promo ---------------------------------//


//--------------------------- Pemesanan ---------------------------------//
Route::get('/home/pesan_kamar', 'HomeController@pesan_kamar');
Route::get('/home/pesan_kamar/search', 'HomeController@search_kamar');
Route::get('/home/pesan_kamar/booking', 'HomeController@booking');
Route::post('/pesan_step1/{id_kelas}/{nama}/{data_reservasi}', 'Administrator\C_Order@step1');
Route::post('/add_order', 'Administrator\C_Order@add');
Route::post('/ajax_check_promo','Administrator\C_Order@ajax_generate_promo');

//--------------------------- Pemesanan ---------------------------------//


//--------------------------- Keuangan ---------------------------------//
Route::get('/home/pemasukan/{parameter}', 'HomeController@pemasukan');
Route::get('/home/pengeluaran', 'HomeController@pengeluaran');
Route::get('/home/neraca', 'HomeController@neraca');
//--------------------------- Keuangan ---------------------------------//



Route::get('/home/tes1', 'HomeController@tes1');
Route::get('/home/tes2', 'HomeController@tes2');
Route::get('/home/tes3', 'HomeController@tes3');

Route::get('/tes','HomeController@tes');

Route::post('/do_login','Auth\LoginController@login');

Route::get('/formregister',function(){
	    return view('auth/register');
});
Route::get('home/logout',function(){
    Auth::logout();
    return redirect('/');
});
