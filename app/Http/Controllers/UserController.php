<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Siswa;

class UserController extends Controller
{
    public function index(){
        $user = DB::table('users')->where('status','3')->get();
        return view('admin.user.siswa', compact('user'));
    }
    public function tampilSiswa(){
        return view('admin.user.addsiswa');

    }
    public function tambahSiswa(Request $request){
        DB::select('call insertUser(?, ?, ?, ?, ?)',[
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
            $request->input('nip'),
            $request->input('status'),
        ]);
        return redirect('admin/siswa');
    }
    public function indexGuru(){
        $user = DB::table('users')->where('status','2')->get();
        return view('admin.user.guru', compact('user'));
    }
    public function tambahGuru(){
        return view('admin.user.addguru');
    }
    public function addGuru(){
        DB::select('call insertUser(?, ?, ?, ?, ?)',[
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
            $request->input('nip'),
            $request->input('status'),
        ]);
        return redirect('admin/guru');
    }
    public function tambahDetailSiswa($id){
        $siswa = User::where('id', $id)->first();
        return view ('admin.user.adddetailsiswa', compact('siswa'));
    }
}
