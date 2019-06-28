<?php

namespace App\Http\Controllers;
use App\Tugas;
use App\Guru;
use App\Kelas;
use App\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasMuridController extends Controller
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

        return view('siswa.tugas.tugas', compact('guru', 'mapel', 'kelas', 'tugas'));
    }
}