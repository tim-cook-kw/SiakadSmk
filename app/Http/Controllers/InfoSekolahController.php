<?php

namespace App\Http\Controllers;
use App\InfoSekolah;
use Image;

use Illuminate\Http\Request;

class InfoSekolahController extends Controller
{
    public function index(){
        $info = InfoSekolah::all();
        return view ('admin.infosekolah', compact('info'));
    }
    public function addInfoSekolah(Request $request){
        $filename = $this->getFileName($request->logo);
        $request->logo->move(base_path('public/images'), $filename);
        InfoSekolah::create([
            'nama' => $request->name,
            'web' => $request->web,
            'email' => $request->email,
            'nama_kepsek' => $request->kepsek,
            'nip_kepsek' => $request->nip,
            'logo' => $filename,
            'visi'=> $request->visi,
            'misi'=>$request->misi,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telp,
        ]);
        
        return redirect()->route('infosekolah.index');
    }
    protected function getFileName($file)
    {
        return str_random(32) . '.' . $file->extension();
    }
    public function editInfoSekolah($id){
        $sekolah = InfoSekolah::find($id);
        return view('admin.editinfosekolah', compact('sekolah'));
    }
    public function updateInfoSekolah(Request $request, $id){
        $filename = $this->getFileName($request->logo);
        $request->logo->move(base_path('public/images'), $filename);
        $sekolah = InfoSekolah::find($id);
        $sekolah->nama = $request->get('name');
        $sekolah->web = $request->get('web');
        $sekolah->email = $request->get('email');
        $sekolah->nama_kepsek = $request->get('kepsek');
        $sekolah->nip_kepsek = $request->get('nip');
        $sekolah->logo = $filename;
        $sekolah->visi = $request->get('visi');
        $sekolah->misi = $request->get('misi');
        $sekolah->alamat = $request->get('alamat');
        $sekolah->no_telepon = $request->get('no_telp');
        $sekolah->save();
        return redirect()->route('insert.infosekolah');

    }
}
