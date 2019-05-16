<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = kelas::with('jurusan')->get();
        $jurusans = Jurusan::all();
        return view('admin.kelas.kelas', compact('jurusans', 'kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.kelas.addkelas', compact('jurusans'));
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
            'id_jurusan'=>'required',
            'nama_kelas'=>'required',
            'level'=>'required'
        ]);

        $kelas = new kelas([
            'id_jurusan' => $request->get('id_jurusan'),
            'nama_kelas' => $request->get('nama_kelas'),
            'level' => $request->get('level')
        ]);
        $kelas->save();
        return redirect('/admin/kelas')->with('success', 'Jurusan saved!');
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
        $jurusans = Jurusan::all();
        $kelas = kelas::find($id);
        return view('admin.kelas.editkelas', compact('kelas', 'jurusans'));
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
            'id_jurusan'=>'required',
            'nama_kelas'=>'required',
            'level' => 'required'
        ]);


        $kelas = kelas::find($id);
        $kelas->id_jurusan = $request->get('id_jurusan');
        $kelas->nama_kelas =  $request->get('nama_kelas');
        $kelas->level =  $request->get('level');
        $kelas->save();

        return redirect('/admin/kelas')->with('success', 'Jurusan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = kelas::find($id);
        $kelas->delete();

        return redirect('/admin/kelas')->with('success', 'kelas deleted!');
    }
}
