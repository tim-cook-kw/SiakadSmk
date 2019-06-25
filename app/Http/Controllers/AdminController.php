<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use Charts;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        $masuk = Absen::where('keterangan', 'masuk')->count();
        $sakit = Absen::where('keterangan', 'sakit')->count();
        $izin = Absen::where('keterangan', 'izin')->count();
        $alfa = Absen::where('keterangan', 'alfa')->count();

        
        $chart = Charts::create('pie', 'c3')
            ->title('Presentasi Absen Siswa')
            ->labels(['Masuk', 'Izin', 'Sakit', 'Tanpa Keterangan'])
            ->values([$masuk, $izin, $sakit, $alfa])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('admin.admin', compact('chart'));
    }
}
