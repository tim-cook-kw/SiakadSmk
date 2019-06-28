<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use Charts;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Siswa;
use Illuminate\Support\Facades\Auth;


class AbsenMuridController extends Controller
{
    public function absen()
    {
        $id_guru = Auth::user()->id;
        $siswa  = Siswa::where('id_user', $id_guru)->first();
        $get_id = $siswa->id;
        
        
        $masuk = Absen::where('id_siswa',  $get_id)->where('keterangan', 'masuk')->count();
        $sakit = Absen::where('id_siswa',  $get_id)->where('keterangan', 'sakit')->count();
        $izin = Absen::where('id_siswa',  $get_id)->where('keterangan', 'izin')->count();
        $alfa = Absen::where('id_siswa',  $get_id)->where('keterangan', 'alfa')->count();

        
        

        $chart = Charts::create('pie', 'c3')
            ->title('Presentasi Absen Siswa')
            ->labels(['Masuk', 'Izin', 'Sakit', 'Tanpa Keterangan'])
            ->values([$masuk, $izin, $sakit,  $alfa])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('siswa.absen.absen', compact('chart'));
    }
}
