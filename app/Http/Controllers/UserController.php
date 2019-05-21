<?php

namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Siswa;
use App\Jurusan;
use App\Kelas;


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
    public function addGuru(Request $request){
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
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view ('admin.user.adddetailsiswa', compact('siswa', 'jurusan', 'kelas'));
    }
    public function insertDetailSiswa(Request $request){
        $filename = $this->getFileName($request->image);
        $request->image->move(base_path('public/siswa'), $filename);
        $siswa = new Kelas([
            'id_jurusan' => $request->get('id_jurusan'),
            'id_kelas' => $request->get('id_kelas'),
            'nama' => $request->get('name'),
            'NIS' => $request->get('nis'),
            'NISN' => $request->get('nisn'),
            'jenis_kelamin' => $request->get('jenis'),
            'agama' => $request->get('agama'),
            'foto' => $filename,
            'tempat_lahir' => $request->get('tempat'),
            'tanggal_lahir' => $request->get('tanggallahir'),
            'ayah' => $request->get('ayah'),
            'ibu' => $request->get('ibu'),
            'no_telepon'=> $request->get('telp'),
            'id_user'=> $request->get('id_user'),
        ]);
        $siswa->save();
        return redirect()->route('tampil.siswa');
    }
    protected function getFileName($file)
    {
        return str_random(32) . '.' . $file->extension();
    }
    
}
