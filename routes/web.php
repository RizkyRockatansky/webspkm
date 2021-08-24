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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//View hasil
Route::get('/hasil/index', 'HasilKuisionerController@index')->name('index');
Route::get('/hasil/index_fuzy', 'HasilKuisionerController@index_fuzy')->name('index_fuzy');
Route::get('/hasil/index_defuzy', 'HasilKuisionerController@index_defuzy')->name('index_defuzy');
Route::get('/fuzzyfikasi/index', 'FuzzyfikasiController@index')->name('index');
Route::get('/defuzzyfikasi/index', 'DefuzzyfikasiController@index')->name('index');


//CRUD MAHASISWA
Route::get('/mahasiswa/index', 'MahasiswaController@index');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa/store', 'MahasiswaController@store');
Route::get('/mahasiswa/edit/{id_mhs}', 'MahasiswaController@edit');
Route::post('/mahasiswa/update', 'MahasiswaController@update');
Route::get('/mahasiswa/delete/{id_mhs}', 'MahasiswaController@delete');

//CRUD Admin
Route::get('/admin/index', 'AdminController@index');
Route::get('/admin/create', 'AdminController@create');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/edit/{id_admin}', 'AdminController@edit');
Route::post('/admin/update', 'AdminController@update');
Route::get('/admin/delete/{id_admin}', 'AdminController@delete');

//CRUD Periode
Route::get('/periode/index', 'PeriodeController@index');
Route::get('/periode/create', 'PeriodeController@create');
Route::post('/periode/store', 'PeriodeController@store');
Route::get('/periode/edit/{id_periode}', 'PeriodeController@edit');
Route::post('/periode/update', 'PeriodeController@update');
Route::get('/periode/delete/{id_periode}', 'PeriodeController@delete');


//CRUD Kategori
Route::get('/kategori/index', 'KategoriController@index');
Route::get('/kategori/create', 'KategoriController@create');
Route::post('/kategori/store', 'KategoriController@store');
Route::get('/kategori/edit/{id_kategori}', 'KategoriController@edit');
Route::post('/kategori/update', 'KategoriController@update');
Route::get('/kategori/delete/{id_kategori}', 'KategoriController@delete');

//CRUD Kuisioner 
Route::get('/kuisioner/index', 'KuisionerController@index');
Route::get('/kuisioner/create', 'KuisionerController@create');
Route::post('/kuisioner/store', 'KuisionerController@store');
Route::get('/kuisioner/edit/{id_kuis}', 'KuisionerController@edit');
Route::post('/kuisioner/update', 'KuisionerController@update');
Route::get('/kuisioner/delete/{id_kuis}', 'KuisionerController@delete');

//CRUD Tentang
Route::get('/tentang/index', 'TentangController@index');
Route::get('/tentang/create', 'TentangController@create');
Route::post('tentang/store', 'TentangController@store');
Route::get('/tentang/edit/{id_tentang}', 'TentangController@edit');
Route::post('tentang/update', 'TentangController@update');
Route::get('/tentang/delete/{id_tentang}', 'TentangController@delete');