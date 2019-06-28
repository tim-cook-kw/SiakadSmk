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
    Route::get('/siswa/edit/{id}', 'UserController@indexEditSiswa');
    Route::post( '/siswa/edit/{id}', 'UserController@editSiswa')->name('edit.user');
    Route::get('/guru/edit/{id}', 'UserController@indexEditGuru');
    Route::post('/guru/edit/{id}','UserController@editGuru')->name('edit.guru');
    Route::get('/siswa/delete/{id}', 'UserController@deleteSiswa')->name('delete.siswa');
    Route::get('/addsiswa', 'UserController@tampilSiswa')->name('tambah.user');
    Route::post('/addsiswa', 'UserController@tambahSiswa')->name('insert.user');
    Route::get('/guru', 'UserController@indexGuru')->name('tampil.guru');
    Route::get('/addguru', 'UserController@tambahGuru')->name('tambah.guru');
    Route::post('/addguru', 'UserController@addGuru')->name('insert.guru');
    Route::get('/guru/delete/{id}', 'UserController@deleteGuru');
    Route::get('/siswa/{id}', 'UserController@tambahDetailSiswa');
    Route::get('/detailsiswa/{id_user}', 'UserController@detailSiwa')->name('index.detail');
    Route::get('/detailsiswa/edit/{id}', 'UserController@indexEditDetailSiswa');
    Route::post('/detailsiswa/edit/{id}', 'UserController@editDetailSiswa')->name('edit.siswa');
    Route::post('/siswa', 'UserController@insertDetailSiswa')->name('insert.siswa');
    Route::get('/guru/{id}', 'UserController@indexAddDetailGuru');
    Route::post('/guru', 'UserController@addDetailGuru')->name('insert.detailguru');
    Route::get('/detailguru/{id}', 'UserController@detailGuru');
    Route::get('detailguru/edit/{id}', 'UserController@indexEditDetailGuru');
    Route::post('detailguru/edit/{id}', 'UserController@editDetailGuru')->name('update.guru');
    Route::get('/infosekolah', 'InfoSekolahController@index')->name('infosekolah.index');
    Route::post('/infosekolah', 'InfoSekolahController@addInfoSekolah')->name('insert.infosekolah');
    Route::get('/infosekolah/{id}', 'InfoSekolahController@editInfoSekolah')->name('edit.sekolah');
    Route::post('/infosekolah/{id}', 'InfoSekolahController@updateInfoSekolah')->name('update.sekolah');

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

    Route::group(['prefix'=>'guru', 'middleware'=>['auth']], function(){
      /**============================= Routing Absen =============================**/
     Route::get('/', 'GuruController@index')->name('guru');
     Route::get('/absen', 'AbsenController@index')->name('tampil.absen');
     Route::get('/addabsen/{id}', 'AbsenController@tampilKelas');
     Route::post('/addabsen', 'AbsenController@store')->name('insert.absen');
     Route::delete('/deleteabsen/{id}', 'AbsenController@destroy')->name('delete.absen');
     Route::get('/editabsen/{id}', 'AbsenController@edit')->name('edit.absen');
     Route::post('/editabsen/{id}', 'AbsenController@update')->name('update.absen');
     Route::get('/absen/siswa', 'AbsenController@absenSiswa')->name('absen.siswa');
     /**============================= END Routing Absen =============================**/

     /**============================= Routing Tugas =============================**/
     Route::get('/tugas', 'TugasController@index')->name('tampil.tugas');
     Route::post('/addtugas/{id}', 'TugasController@addtugas');
     Route::post('/addtugas', 'TugasController@store')->name('insert.tugas');
     Route::get('/tugas/delet/{id}', 'TugasController@destroy')->name('delete.tugas');
     /**============================= END Routing Absen =============================**/

      /**============================= Routing Nilai =============================**/
      Route::get('/nilai', 'NilaiController@index')->name('tampil.nilai');
      Route::get('view_siswa/{id}','NilaiController@view');
      Route::get('/nilai/addnilai/{id}', 'NilaiController@indexAddNilai');
      Route::post('/addnilai', 'NilaiController@addnilai')->name('insert.nilai');
      /**============================= END Routing Nilai =============================**/
    });



    Route::group(['prefix'=>'murid', 'middleware'=>['auth']], function(){
        Route::get('/', 'SiswaController@index');

    /**============================= Murid Absen =============================**/
     Route::get('absen','AbsenMuridController@absen');
     Route::get('tugas','TugasMuridController@index')->name('tampil.tugas');
     /**============================= END Routing Absen =============================**/
    });
     

  

Route::get('/home', 'HomeController@index')->name('home');
