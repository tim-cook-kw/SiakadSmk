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
    return view('home');
});


Route::group(['prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/siswa', 'UserController@index')->name('tampil.siswa');
    Route::get('/addsiswa', 'UserController@tampilSiswa')->name('tambah.user');
    Route::post('/addsiswa', 'UserController@tambahSiswa')->name('insert.user');
    Route::get('/guru', 'UserController@indexGuru')->name('tampil.guru');
    Route::get('/addguru', 'UserController@tambahGuru')->name('tambah.guru');
    Route::post('/addguru', 'UserController@addGuru')->name('insert.guru');
    Route::get('/siswa/{id}', 'UserController@tambahDetailSiswa');
});

Route::resource('/jurusan', 'jurusanController');

Route::get('/table/jurusan', 'jurusanController@dataTable')->name('table.jurusan');
Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
