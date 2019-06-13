<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Siswa;
use App\Jurusan;
use App\Kelas;
use Image;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $siswa = Siswa::all();

        $user = DB::table('users')->where('status','3')->get();
        return view('admin.user.siswa', compact('user', 'siswa'));
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
    public function indexeditsiswa($id){
        $siswa = User::where('id', $id)->first();
        return view('admin.user.editsiswa', compact('siswa'));
    }
    public function editSiswa(Request $request, $id){
        $siswa = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'nip' => $request->get('nip'),
            'status' => $request->get('status')
        );
        User::whereId($id)->update($siswa);
        return redirect()->route('tampil.siswa');
    }
    public function deleteSiswa($id){
        $siswa = User::find($id);
        $detail = Siswa::where('id_user', $id);
        $siswa->delete();
        $detail->delete();
        return redirect()->route('tampil.siswa');
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
        $siswa = new Siswa([
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
    public function indexEditDetailSiswa($id){
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('admin.user.editdetailsiswa', compact('siswa', 'kelas', 'jurusan'));
    }
    public function editDetailSiswa(Request $request, $id){
        $filename = $request->get('name_image');
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
            'image' => 'image|max:2048',
            'id_user'=> 'required'
            ]);
            $image->move(public_path('siswa'), $filename);
        }else{
            $request->validate([
                'id_user'=> 'required'
                ]);
        }
        $siswa = array(
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
        );
        Siswa::where('id')->update($siswa);



        return back();
    }

    public function detailSiwa($id){
        $siswa = Siswa::where('id_user', $id)->get();
        $users = User::where('id', $id)->first();
        return view('admin.user.detailsiswa', compact('siswa', 'users'));
    }

}
