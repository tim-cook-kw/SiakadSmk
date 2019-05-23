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


Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/siswa', 'UserController@index')->name('tampil.siswa');
    Route::get('/addsiswa', 'UserController@tampilSiswa')->name('tambah.user');
    Route::post('/addsiswa', 'UserController@tambahSiswa')->name('insert.user');
    Route::get('/guru', 'UserController@indexGuru')->name('tampil.guru');
    Route::get('/addguru', 'UserController@tambahGuru')->name('tambah.guru');
    Route::post('/addguru', 'UserController@addGuru')->name('insert.guru');
    Route::get('/siswa/{id}', 'UserController@tambahDetailSiswa');
    Route::post('/siswa', 'UserController@insertDetailSiswa')->name('insert.siswa');
    Route::get('/infosekolah', 'InfoSekolahController@index')->name('infosekolah.index');
    Route::post('/infosekolah', 'InfoSekolahController@addInfoSekolah')->name('insert.infosekolah');
    Route::get('/infosekolah/{id}', 'InfoSekolahController@editInfoSekolah')->name('edit.sekolah');
    Route::post('/infosekolah/{id}', 'InfoSekolahController@updateInfoSekolah')->name('update.sekolah');
    Route::get('/siswa/edit/{id}', 'UserController@indexEditDetailSiswa');
    Route::put('/siswa/edit/{id}', 'UserController@editDetailSiswa')->name('edit.siswa');

     /**============================= Routing Jurusan =============================**/
     Route::get('/jurusan', 'JurusanController@index')->name('tampil.jurusan');
     Route::get('/addjurusan', 'JurusanController@create')->name('tambah.jurusan');
     Route::post('/addjurusan', 'JurusanController@store')->name('insert.jurusan');
     Route::delete('/deletejurusan/{id}', 'JurusanController@destroy')->name('delete.jurusan');
     Route::get('/editjurusan/{id}', 'JurusanController@edit')->name('edit.jurusan');
     Route::post('/editjurusan/{id}', 'JurusanController@update')->name('update.jurusan');
     /**============================= END Routing Jurusan =============================**/
 
     /**============================= Routing Mapel =============================**/
     Route::get('/mapel', 'MapelController@index')->name('tampil.mapel');
     Route::get('/addmapel', 'MapelController@create')->name('tambah.mapel');
     Route::post('/addmapel', 'MapelController@store')->name('insert.mapel');
     Route::delete('/deletemapel/{id}', 'MapelController@destroy')->name('delete.mapel');
     Route::get('/editmapel/{id}', 'MapelController@edit')->name('edit.mapel');
     Route::post('/editmapel/{id}', 'MapelController@update')->name('update.mapel');
     /**============================= END Routing Mapel =============================**/
      /**============================= Routing Kelas =============================**/
      Route::get('/kelas', 'KelasController@index')->name('tampil.kelas');
      Route::get('/addkelas', 'KelasController@create')->name('tambah.kelas');
      Route::post('/addkelas', 'KelasController@store')->name('insert.kelas');
      Route::delete('/deletekelas/{id}', 'KelasController@destroy')->name('delete.kelas');
      Route::get('/editkelas/{id}', 'KelasController@edit')->name('edit.kelas');
      Route::post('/editkelas/{id}', 'KelasController@update')->name('update.kelas');
      /**============================= END Routing Kelas =============================**/
    });
    Route::Auth(['register'=>false]);

   


  



Route::get('/home', 'HomeController@index')->name('home');
