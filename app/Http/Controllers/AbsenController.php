<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = absen::all();
        return view('guru.absensi_siswa.absen', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.absensi_siswa.addabsen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa'=>'required',
            'waktu'=>'required',
            'keterangan'=>'required'
        ]);

        $jurusan = new Jurusan([
            'id_siswa' => $request->get('id_siswa'),
            'waktu' => $request->get('waktu'),
            'keterangan' => $request->get('keterangan')
        ]);
        $jurusan->save();
        return redirect('/guru/absensi_siswa')->with('success', 'Absensi saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absen = absen::find($id);
        return view('guru.absensi_siswa.editabsen', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_siswa'=>'required',
            'waktu'=>'required',
            'keterangan'=>'required'
        ]);


        $absen = absen::find($id);
        $absen->id_siswa =  $request->get('id_siswa');
        $absen->waktu = $request->get('waktu');
        $absen->keterangan = $request->get('keterangan');
        $absen->save();

        return redirect('/guru/absensi_siswa')->with('success', 'Absensi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = absen::find($id);
        $absen->delete();

        return redirect('/guru/absensi_siswa')->with('success', 'Absensi deleted!');
    }
}
