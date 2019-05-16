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
}
