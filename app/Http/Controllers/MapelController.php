<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with('jurusan')->get();
        $jurusans = Jurusan::all();
        return view('admin.mapel.mapel', compact('jurusans', 'mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.mapel.addmapel', compact('jurusans'));
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
            'nama_mapel'=>'required',
            'id_jurusan'=>'required'
        ]);

        $mapel = new Mapel([
            'nama_mapel' => $request->get('nama_mapel'),
            'id_jurusan' => $request->get('id_jurusan')
        ]);
        $mapel->save();
        return redirect('/admin/mapel')->with('success', 'Jurusan saved!');
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
        $mapel = Mapel::find($id);
        $jurusans = Jurusan::all();
        return view('admin.mapel.editmapel', compact('mapel', 'jurusans'));
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
            'nama_mapel'=>'required',
            'id_jurusan'=>'required'
        ]);


        $mapel = Mapel::find($id);
        $mapel->nama_mapel =  $request->get('nama_mapel');
        $mapel->id_jurusan = $request->get('id_jurusan');
        $mapel->save();

        return redirect('/admin/mapel')->with('success', 'Jurusan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect('/admin/mapel')->with('success', 'Mapel deleted!');
    }
}
