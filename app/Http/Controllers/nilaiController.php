<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Siswa;
use App\Guru;
use App\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index(){
        
        $kelas = Kelas::all();
        
        
        return view('guru.nilai.nilai', compact('kelas'));
    }
    public function view($id)
    {
        $kelas = Siswa::where('id_kelas' ,$id)->get();
        
        
       return view('guru.nilai.view_siswa',compact('kelas'));
    }
    public function indexAddNilai($id){
        $siswa = Siswa::where('id', $id)->first();
        $idkelas = $siswa->id_kelas;
        $kelas = Kelas::where('id', $idkelas)->first();

        return view('guru.nilai.modal.addnilai', compact('siswa', 'kelas'));
    }

    public function addnilai(Request $request){
        $nilai = new Nilai([
            'id_siswa' => $request->get('id_siswa'),
            'id_kelas' => $request->get('id_siswa'),
            'UH1' => $request->get('UH1'),
            'UTS'=>$request->get('UTS'),
            'UH2'=>$request->get('UH2'),
            'UAS'=>$request->get('UAS'),
            'semester'=>$request->get('semester')

        ]);
        $nilai->save();
        return back();
    }

    

}
