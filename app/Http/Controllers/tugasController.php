<?php

namespace App\Http\Controllers;
use App\Tugas;
use App\Guru;
use App\Kelas;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_guru = Auth::user()->id;
        $guru  = Guru::where('id_user', $id_guru)->first();
        $get_id = $guru->id;
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $tugas = Tugas::where('id_guru', $get_id)->get();

        return view('guru.tugas.tugas', compact('guru', 'mapel', 'kelas', 'tugas'));
    }


    public function tampilKelas($id){
        $siswa = Siswa::where('id_kelas', $id)->get();
        return view( 'guru.tugas.modal.addtugas', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all() ;
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        return view('guru.tugas.modal.addtugas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $file->move(base_path('public/tugas'),$file->getClientOriginalName());
        $tugas = new Tugas([
            'id_guru'=>$request->get('id_guru'),
            'id_kelas'=>$request->get('id_kelas'),
            'id_mapel'=>$request->get('id_mapel'),
            'tugas'=>$request->get('nama'),
            'file'=>$file->getClientOriginalName()
        ]);
        $tugas->save();
        return back();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            $siswa = Tugas::find($id);
            $siswa->delete();
            return back();
    }
}
